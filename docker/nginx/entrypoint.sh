#!/bin/sh
rm -rf "/etc/nginx/conf.d/default.conf"
NGINX_SITE_CONFIG="/etc/nginx/conf.d/alsaraha.conf"
if [ ! -f $NGINX_SITE_CONFIG ]; then
NGINX_SITE_CONFIG_CONTENT=$(cat <<EOF
server {  
     listen 80; 
     listen 443;
     #access_log off;
     server_name ${DOMAIN_NAME} www.${DOMAIN_NAME}; 
     root /var/www/html/${DOMAIN_NAME}/public;  
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
          fastcgi_pass ${PHP_SERVICE_NAME}:${PHP_SERVICE_PORT};
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
          if (\$host ~* ^www\.(.*)) {
             return 301 \$scheme://\$1\$request_uri;
          }
          add_header Access-Control-Allow-Origin *;
          try_files \$uri \$uri/ /index.php?\$query_string;
     }
}
EOF
)

# Check if the file not exist create it
if [ ! -f "$NGINX_SITE_CONFIG" ]; then
  touch "$NGINX_SITE_CONFIG"
  echo "$NGINX_SITE_CONFIG_CONTENT" >> "$NGINX_SITE_CONFIG"
fi

fi

nginx -g 'daemon off;'