#!/bin/sh
if [ ! -f /etc/letsencrypt/done ]; then
  
certbot_output=$(certbot certonly --webroot --webroot-path=/var/www/certbot -d "${DOMAIN_NAME}" -d "www.${DOMAIN_NAME}" -m email@email.com --non-interactive --agree-tos --no-eff-email 2>&1)

echo $certbot_output
if echo "$certbot_output" | grep -q "Congratulations"; then
  touch /etc/letsencrypt/done 

SSL_GENERAL_CONFIG_PATH="/var/www/nginx/ssl/ssl.conf"
TO_HTTPS_NON_WWW_PATH="/var/www/nginx/ssl/redirection.to_https_non_www"
SSL_CONFIG=$(cat <<EOF
server {  
     listen 443 ssl; 
     #access_log off;
     server_name _ ${DOMAIN_NAME} www.${DOMAIN_NAME}; 
     root /var/www/html/public;  
     index index.php index.html index.htm index.nginx-debian.html;
     proxy_cache_valid 200 365d;
     charset utf-8; 
     
     if (!-d \$request_filename) {
          rewrite ^/(.+)/$ /\$1 permanent;
     }
     if (\$request_uri ~* //) {
          rewrite ^/(.*) /\$1 permanent;
     }
     location ~ \.(env|log|htaccess)$ {
          deny all;
     } 
 
     access_log off;  
     error_log /var/log/nginx/error.log error;  

     sendfile off;  

     client_max_body_size 1000m;  

     location ~ /.well-known/acme-challenge {
          root /var/www/certbot;
          allow all;
     }

     location ~*\.(?:js|jpg|jpeg|gif|png|css|tgz|gz|rar|bz2|doc|pdf|ppt|tar|wav|bmp|rtf|swf|ico|flv|txt|woff|woff2|svg|mp3|jpe?g,eot|ttf|svg)$ {
        access_log off;
        expires 360d;
        add_header Access-Control-Allow-Origin *;
        add_header Pragma public;
        add_header Cache-Control "public";
        add_header Vary Accept-Encoding; 
        try_files \$uri \$uri/ /index.php?\$query_string;
     }

     location ~ \.php$ {  

          try_files \$uri =404;
          fastcgi_split_path_info ^(.+\.php)(/.+)$;
          fastcgi_pass php-service:9000;
          fastcgi_index index.php;
          include fastcgi_params;
          fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
          fastcgi_param PATH_INFO \$fastcgi_path_info;
        
          fastcgi_read_timeout 8600;
          fastcgi_intercept_errors off;  
          fastcgi_buffer_size 16k;  
          fastcgi_buffers 4 16k;  
     }  

     location ~ /.ht {  
      deny all;  
     } 

     location / {


          if ( \$host = www.${DOMAIN_NAME} ){
            return 301 https://${DOMAIN_NAME}\$request_uri;
          }
          if ( \$scheme = http ){
            return 301 https://${DOMAIN_NAME}\$request_uri;
          }

          add_header Access-Control-Allow-Origin *;
          try_files \$uri \$uri/ /index.php?\$query_string;
     }
     ssl_certificate /etc/letsencrypt/live/${DOMAIN_NAME}/fullchain.pem;
     ssl_certificate_key /etc/letsencrypt/live/${DOMAIN_NAME}/privkey.pem;
}
EOF
)
TO_HTTPS_NON_WWW=$(cat <<EOF
  return 301 https://${DOMAIN_NAME}$request_uri;
EOF
)

# Check if the file not exist create it
if [ ! -f "$SSL_GENERAL_CONFIG_PATH" ]; then
  touch "$SSL_GENERAL_CONFIG_PATH"
fi
# Check if the lines already exist
if ! grep -q "listen 443 ssl;" "$SSL_GENERAL_CONFIG_PATH"; then
  # Append the lines to the config file
  echo -e "$SSL_CONFIG" >> "$SSL_GENERAL_CONFIG_PATH"
fi



if [ ! -f "$TO_HTTPS_NON_WWW_PATH" ]; then
  touch "$TO_HTTPS_NON_WWW_PATH"
fi
if ! grep -q "return 301" "$TO_HTTPS_NON_WWW_PATH"; then
  # Append the lines to the config file
  echo -e "$TO_HTTPS_NON_WWW" >> "$TO_HTTPS_NON_WWW_PATH"
fi




fi

fi
# Start the renewal process in a loop
trap exit TERM
while :; do
  certbot renew
  sleep 12h & wait $!
done
