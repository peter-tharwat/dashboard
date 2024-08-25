#!/bin/sh


default_namespace="default"
default_domain_name="example.com"
default_slug_domain_name="example-com"
default_repo_url="https://token@github.com/user/repo.git"

 

while getopts "d:n:r:i:" opt; do
  case ${opt} in
    d)
      domain_name=${OPTARG}
      ;;
    n)
      name_space=${OPTARG}
      ;;
    r)
      repo_url=${OPTARG}
      ;;
    i)
      ingress_name=${OPTARG}
      ;;
  esac
done



#read -p "Please Enter name_space :=> " name_space
#read -p "Please Enter domain_name like example.com :=> " domain_name

slug_domain_name=$(echo "$domain_name" | sed "s/\./-/g")

if [ "$name_space" != "default" ]; then
	name_space="$name_space-namespace"
fi

if [ "$ingress_name" == "" ]; then
  ingress_name="ingress-${slug_domain_name}"
fi


#helm install superzaki-com ingress-nginx/ingress-nginx -f nginx/values.yaml

cat <<EOL > deploy.yaml
apiVersion: v1
kind: ConfigMap
metadata:
  name: php-config-${slug_domain_name}
  namespace: ${name_space}
data:
  custom-php.ini: |
    post_max_size = 10000M
    upload_max_filesize = 5000M
    max_execution_time = 24000
    memory_limit = 5120M
    max_input_time = 24000
---
apiVersion: v1
kind: ConfigMap
metadata:
  name: nginx-config-file-${slug_domain_name}
  namespace: ${name_space}
data:
  maintenance.html: |
      <!DOCTYPE html>
      <html lang="en">
      <head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&family=Zain:wght@200;300;400;700;800;900&display=swap" rel="stylesheet"><title>تحت الصيانة</title>
          <style>body {display: flex;justify-content: center;align-items: center;height: 100vh;margin: 0;font-family: Arial, sans-serif;background-color: #fff;color: #333;}.container {text-align: center;padding: 20px;}h1 {font-size: 2em;margin-bottom: 0.5em;}p {font-size: 1.2em;}*{direction: rtl;font-family: "Noto Kufi Arabic", sans-serif;font-optical-sizing: auto;font-weight: normal;}</style>
      </head>
      <body style=""><div class="container"><img src="https://i.ibb.co/tBgVwSz/light-bulb-1.png" style="width:200px;max-width: 80%;"><h1>لحظة من فضلك !</h1><p>موقعنا تحت الصيانة بشكل مؤقت حالياً وسنعود في خلال لحظات</p></div>
      </body>
      </html>
  site.conf: |
      log_format custom '\$remote_addr - \$remote_user [\$time_local] "\$request" '
                      'Headers: \$http_user_agent, \$http_cookie, \$http_referer, \$http_x_forwarded_for, \$http_host';

      gzip on;
      gzip_disable "msie6";
      gzip_vary on;
      gzip_proxied any;
      gzip_comp_level 6;
      gzip_buffers 16 8k;
      gzip_http_version 1.1;
      gzip_types text/plain text/css application/json application/javascript text/xml application/xml application/xml+rss text/javascript;

      client_body_buffer_size 10K;
      client_max_body_size 20000M;
      client_header_buffer_size 1k;
      large_client_header_buffers 4 4k;


      server {  
       listen 80; 
       listen 443;
       #access_log off;
       client_max_body_size 20000M;
       server_name _ ${domain_name} www.${domain_name}; 
       root /var/www/html/site/public;  
       index index.php index.html index.htm index.nginx-debian.html;
       proxy_cache_valid 200 365d;
       charset utf-8; 


       set_real_ip_from 0.0.0.0/0;
       real_ip_header X-Forwarded-For;
       real_ip_recursive on;

       error_page 404 403 500 502 503 504 /maintenance.html;
       location = /maintenance.html {
          root /usr/share/nginx/html;
          index index.html;
          #internal;
       }

       location /health-check-nginx {
            return 200 'Healthy';
            add_header Content-Type text/plain;
        }
       if (!-d \$request_filename) {
            rewrite ^/(.+)/$ /\$1 permanent;
       }
       if (\$request_uri ~* //) {
            rewrite ^/(.*) /\$1 permanent;
       }
       location ~ \.(env|log|htaccess)$ {
            deny all;
       } 
   
       #access_log off;  
       error_log /var/log/nginx/error.log error;  

       sendfile off;  


        location ~ /.well-known/acme-challenge {
            root /var/www/certbot;
            allow all;
        }

        if (\$request_uri ~* "^(.*/)index\.php(/?)(.*)") {
              return 301 \$1\$3;
        }

        #proxy_pass_request_headers on;
        #proxy_set_header X-Forwarded-Proto \$scheme;
        #proxy_set_header X-Forwarded-For \$proxy_add_x_forwarded_for;
        #proxy_set_header X-Real-IP \$remote_addr;
        #proxy_set_header Host \$host;
            
       location ~*\.(?:js|jpg|jpeg|gif|png|css|tgz|gz|rar|bz2|doc|pdf|ppt|tar|wav|bmp|rtf|swf|ico|flv|txt|woff|woff2|svg|mp3|jpe?g,eot|ttf|svg)$ {
          access_log off;
          expires 360d;
          add_header Access-Control-Allow-Origin *;
          add_header Pragma public;
          add_header Cache-Control "public";
          add_header Vary Accept-Encoding; 
          try_files \$uri \$uri/ /index.php?\$query_string;
       }

       location / {
            if (\$host ~* ^www\.(.*)$) {
                return 301 \$scheme://\$1\$request_uri;
            }
            
            add_header Access-Control-Allow-Origin *;
            try_files \$uri \$uri/ /index.php?\$query_string;
       }

       location ~ \.php$ {

            

            if (\$host ~* ^www\.(.*)$) {
                return 301 \$scheme://\$1\$request_uri;
            }


            try_files \$uri =404;
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            fastcgi_pass php-service-${slug_domain_name}:9000;
            fastcgi_index index.php;
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
            fastcgi_param PATH_INFO \$fastcgi_path_info;
            fastcgi_param HTTPS on;
          
            fastcgi_read_timeout 8600;
            fastcgi_intercept_errors off;  
            fastcgi_buffer_size 16k;  
            fastcgi_buffers 4 16k; 
       }  

       location ~ /.ht {  
        deny all;  
       }
      }
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: nginx-controller-${slug_domain_name}
  namespace: ${name_space}
spec:
  replicas: 1
  selector:
    matchLabels:
      app: nginx-basic-${slug_domain_name}
  template:
    metadata:
      labels:
        app: nginx-basic-${slug_domain_name}
    spec:
      containers:
      - name: nginx-container-${slug_domain_name}
        image: petertharwat/nginx-1.27-github:v1.0.9
        resources:
          requests:
            cpu: "100m"
            memory: "100Mi"
          limits:
            cpu: "200m"
            memory: "200Mi"
        livenessProbe:
          httpGet:
            path: /health-check-nginx
            port: 80
          initialDelaySeconds: 30
          periodSeconds: 10
        readinessProbe:
          httpGet:
            path: /health-check-nginx
            port: 80
          initialDelaySeconds: 30
          periodSeconds: 10
        env:
          - name: REPO_URL
            valueFrom:
              configMapKeyRef:
                name: laravel-env-${slug_domain_name}
                key: REPO_URL

          - name: DOMAIN_NAME
            value: "${domain_name}"
          - name: PHP_SERVICE_NAME
            value: php-service-${slug_domain_name}
          - name: PHP_SERVICE_PORT
            value: "9000"
          - name: ENABLE_SSL_PASSTHROUGH
            value: "true"

        ports:
          - containerPort: 80
            name: http
          - containerPort: 443
            name: https
        #command: ["/bin/bash","-c"]
        #args: ["/docker-entrypoint.sh"]
        volumeMounts:
          - name: nginx-config-file-${slug_domain_name}
            mountPath: /etc/nginx/conf.d/default.conf
            subPath: site.conf

          - name: nginx-config-file-${slug_domain_name}
            mountPath: /usr/share/nginx/html/maintenance.html
            subPath: maintenance.html

      volumes:
        - name: nginx-config-file-${slug_domain_name}
          configMap:
           name: nginx-config-file-${slug_domain_name}
           items:
           - key: site.conf
             path: site.conf

           - key: maintenance.html
             path: maintenance.html

        - name: laravel-env-${slug_domain_name}
          configMap:
            name: laravel-env-${slug_domain_name}
---
apiVersion: autoscaling/v2
kind: HorizontalPodAutoscaler
metadata:
  name: nginx-hpa-${slug_domain_name}
  namespace: ${name_space}
spec:
  scaleTargetRef:
    apiVersion: apps/v1
    kind: Deployment
    name: nginx-controller-${slug_domain_name}
  minReplicas: 1
  maxReplicas: 20
  metrics:
  - type: Resource
    resource:
      name: cpu
      target:
        type: Utilization
        averageUtilization: 100
  behavior:
    scaleDown:
      stabilizationWindowSeconds: 300
      selectPolicy: Max
      policies:
        - type: Percent
          value: 50
          periodSeconds: 10
        - type: Pods
          value: 1
          periodSeconds: 10
    scaleUp:
      stabilizationWindowSeconds: 20
      selectPolicy: Max
      policies:
        - type: Percent
          value: 50
          periodSeconds: 5
        - type: Pods
          value: 2
          periodSeconds: 5 
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: php-deployment-${slug_domain_name}
  namespace: ${name_space}
spec:
  replicas: 1
  selector:
    matchLabels:
      app: php-basic-${slug_domain_name}
  template:
    metadata:
      labels:
        app: php-basic-${slug_domain_name}
    spec:
      containers:
        - name: php-fpm-container-${slug_domain_name}
          image: petertharwat/php-fpm-8.3-github:v1.0.9
          resources:
            requests:
              cpu: "200m"
              memory: "200Mi"
            limits:
              cpu: "1200m"
              memory: "1200Mi"
          ports:
            - containerPort: 9000


          livenessProbe:
            exec:
              command:
              - /bin/sh
              - -c
              - php /var/www/html/site/artisan db:show || exit 1
            initialDelaySeconds: 0
            periodSeconds: 7
            failureThreshold: 50
            timeoutSeconds: 5

          readinessProbe:
            exec:
              command:
              - /bin/sh
              - -c
              - php /var/www/html/site/artisan list || exit 1
            initialDelaySeconds: 0
            periodSeconds: 7
            failureThreshold: 50
            timeoutSeconds: 5

          #startupProbe:
          #  exec:
          #    command:
          #    - /bin/sh
          #    - -c
          #    - php /var/www/html/artisan route:clear || exit 1
          #  initialDelaySeconds: 10
          #  periodSeconds: 5
          #  failureThreshold: 30

          env:
            - name: REPO_URL
              valueFrom:
                configMapKeyRef:
                  name: laravel-env-${slug_domain_name}
                  key: REPO_URL

            - name: RUN_SHELL_AFTER_PULL
              value: "chown -R www-data:www-data /var/www/html/site && chmod 777 -R /var/www/html/site && php /var/www/html/site/artisan optimize:clear"

          volumeMounts:
            - name: laravel-env-${slug_domain_name}
              mountPath: /var/www/html/site/.env
              subPath: .env

            - name: php-config-${slug_domain_name}
              mountPath: /usr/local/etc/php/conf.d/custom-php.ini
              subPath: custom-php.ini


            #- name: log-volume
            #  mountPath: /var/log

      volumes:
        - name: laravel-env-${slug_domain_name}
          configMap:
            name: laravel-env-${slug_domain_name}

        - name: php-config-${slug_domain_name}
          configMap:
            name: php-config-${slug_domain_name}
        #- name: log-volume
        #  emptyDir: {}
---
apiVersion: autoscaling/v2
kind: HorizontalPodAutoscaler
metadata:
  name: php-hpa-${slug_domain_name}
  namespace: ${name_space}
spec:
  scaleTargetRef:
    apiVersion: apps/v1
    kind: Deployment
    name: php-deployment-${slug_domain_name}
  minReplicas: 1
  maxReplicas: 20
  metrics:
  - type: Resource
    resource:
      name: cpu
      target:
        type: Utilization
        averageUtilization: 100
  behavior:
    scaleDown:
      stabilizationWindowSeconds: 300
      selectPolicy: Max
      policies:
        - type: Percent
          value: 50
          periodSeconds: 10
        - type: Pods
          value: 1
          periodSeconds: 10
    scaleUp:
      stabilizationWindowSeconds: 20
      selectPolicy: Max
      policies:
        - type: Percent
          value: 100
          periodSeconds: 5
        - type: Pods
          value: 2
          periodSeconds: 5 
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: queue-${slug_domain_name}
  namespace: ${name_space}
spec:
  replicas: 1
  selector:
    matchLabels:
      app: queue-${slug_domain_name}
  template:
    metadata:
      labels:
        app: queue-${slug_domain_name}
    spec:
      containers:
        - name: queue-${slug_domain_name}
          image: petertharwat/php-fpm-8.3-github:v1.0.9
          resources:
            requests:
              cpu: "100m"
              memory: "100Mi"
            limits:
              cpu: "1000m"
              memory: "1000Mi"
          livenessProbe:
            exec:
              command:
              - /bin/sh
              - -c
              - php /var/www/html/site/artisan db:show || exit 1
            initialDelaySeconds: 0
            periodSeconds: 7
            failureThreshold: 50
            timeoutSeconds: 5

          readinessProbe:
            exec:
              command:
              - /bin/sh
              - -c
              - php /var/www/html/site/artisan list || exit 1
            initialDelaySeconds: 0
            periodSeconds: 7
            failureThreshold: 50
            timeoutSeconds: 5

          env:
            - name: CRON_SCHEDULE
              value: "* * * * *"  # This schedule runs every minute
            - name: CRON_SCRIPT_CONTENT
              value: "cd /var/www/html/site && /usr/local/bin/php artisan queue:restart && cd /var/www/html/site && /usr/local/bin/php artisan queue:work --tries=3"

            - name: REPO_URL
              valueFrom:
                configMapKeyRef:
                  name: laravel-env-${slug_domain_name}
                  key: REPO_URL

          volumeMounts:
            - name: laravel-env-${slug_domain_name}
              mountPath: /var/www/html/site/.env
              subPath: .env

            - name: php-config-${slug_domain_name}
              mountPath: /usr/local/etc/php/conf.d/custom-php.ini
              subPath: custom-php.ini


      volumes:
        - name: laravel-env-${slug_domain_name}
          configMap:
            name: laravel-env-${slug_domain_name}

        - name: php-config-${slug_domain_name}
          configMap:
            name: php-config-${slug_domain_name}
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: schedule-${slug_domain_name}
  namespace: ${name_space}
spec:
  replicas: 1
  selector:
    matchLabels:
      app: schedule-${slug_domain_name}
  template:
    metadata:
      labels:
        app: schedule-${slug_domain_name}
    spec:
      containers:
        - name: schedule-${slug_domain_name}
          image: petertharwat/php-fpm-8.3-github:v1.0.9
          resources:
            requests:
              cpu: "100m"
              memory: "100Mi"
            limits:
              cpu: "1000m"
              memory: "1000Mi"
          livenessProbe:
            exec:
              command:
              - /bin/sh
              - -c
              - php /var/www/html/site/artisan db:show || exit 1
            initialDelaySeconds: 0
            periodSeconds: 7
            failureThreshold: 50
            timeoutSeconds: 5

          readinessProbe:
            exec:
              command:
              - /bin/sh
              - -c
              - php /var/www/html/site/artisan list || exit 1
            initialDelaySeconds: 0
            periodSeconds: 7
            failureThreshold: 50
            timeoutSeconds: 5

          env:

            - name: CRON_SCHEDULE
              value: "* * * * *"  # This schedule runs every minute
            - name: CRON_SCRIPT_CONTENT
              value: "cd /var/www/html/site && /usr/local/bin/php artisan schedule:run"

            - name: REPO_URL
              valueFrom:
                configMapKeyRef:
                  name: laravel-env-${slug_domain_name}
                  key: REPO_URL

          volumeMounts:
            - name: laravel-env-${slug_domain_name}
              mountPath: /var/www/html/site/.env
              subPath: .env

            - name: php-config-${slug_domain_name}
              mountPath: /usr/local/etc/php/conf.d/custom-php.ini
              subPath: custom-php.ini


      volumes:
        - name: laravel-env-${slug_domain_name}
          configMap:
            name: laravel-env-${slug_domain_name}

        - name: php-config-${slug_domain_name}
          configMap:
            name: php-config-${slug_domain_name}
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: redis-${slug_domain_name}
  namespace: ${name_space}
spec:
  replicas: 1
  selector:
    matchLabels:
      app: redis-${slug_domain_name}
  template:
    metadata:
      labels:
        app: redis-${slug_domain_name}
    spec:
      containers:
      - name: redis-${slug_domain_name}
        image: redis:6.2
        resources:
          requests:
            cpu: "100m"
            memory: "100Mi"
          limits:
            cpu: "1000m"
            memory: "1000Mi"
        ports:
        - containerPort: 6379
EOL

mkdir nginx/
cat <<EOL > nginx/values.yaml
controller:
  replicaCount: 1
  resources:
    requests:
      cpu: 100m
      memory: 100Mi
    limits:
      cpu: 200m
      memory: 200Mi

  ingressClassResource:
    name: "${ingress_name}"
    enabled: true
    default: false
  ingressClass: "${ingress_name}"

  hpa:
    enabled: true
    minReplicas: 1
    maxReplicas: 20
    targetCPUUtilizationPercentage: 80

    behavior:
      scaleUp:
        stabilizationWindowSeconds: 20
        policies:
          - type: Percent
            value: 200
            periodSeconds: 10
      scaleDown:
        stabilizationWindowSeconds: 300
        policies:
          - type: Percent
            value: 100
            periodSeconds: 10
    tolerance: 0.1


  admissionWebhooks:
    enabled: false
    namespace: "${name_space}" # Specify the namespace here

  # Service settings, including Proxy Protocol and Google Cloud Load Balancer annotations
  service:
    namespace: "${name_space}"
    annotations:
      ingress.kubernetes.io/enable-global-access: "true" # Enable global access
      service.beta.kubernetes.io/external-traffic: "OnlyLocal" # Proxy Protocol
      service.beta.kubernetes.io/external-traffic-policy: "Local"
      service.beta.kubernetes.io/load-balancer-proxy-protocol: "*" # Enable Proxy Protocol
      #service.beta.kubernetes.io/vultr-loadbalancer-proxy-protocol: v2
  config:
    allow-snippet-annotations: "false"
    use-forwarded-headers: "true"
    enable-real-ip: "true"
    #use-proxy-protocol: "true"

  defaultBackend:
    enabled: false
    
EOL
cat <<EOL > ingress.yaml
apiVersion: networking.k8s.io/v1
kind: Ingress
metadata:
  name: "ingress-${slug_domain_name}""
  namespace: ${name_space}
  annotations:
    nginx.ingress.kubernetes.io/rewrite-target: /
    kubernetes.io/ingress.class: "${ingress_name}"
    cert-manager.io/cluster-issuer: "letsencrypt-prod-${slug_domain_name}"
    nginx.ingress.kubernetes.io/ssl-redirect: "false" #change it after ssl
    nginx.ingress.kubernetes.io/force-ssl-redirect: "false" #change it after ssl
    nginx.ingress.kubernetes.io/ssl-passthrough: "true"
    nginx.ingress.kubernetes.io/use-forwarded-headers: "true"
    nginx.ingress.kubernetes.io/real-ip-header: "X-Forwarded-For"
    nginx.ingress.kubernetes.io/set-real-ip-from: "0.0.0.0/0"
    nginx.ingress.kubernetes.io/x-forwarded-for: "\$proxy_add_x_forwarded_for"
    nginx.ingress.kubernetes.io/proxy-set-headers: "true"
    nginx.ingress.kubernetes.io/proxy-body-size: "1000m"
spec:
  ingressClassName: "${ingress_name}"
  rules:
  - host: ${domain_name}
    http:
      paths:
      - path: /
        pathType: Prefix
        backend:
          service:
            name: nginx-service-${slug_domain_name}
            port:
              number: 80
      - path: /
        pathType: Prefix
        backend:
          service:
            name: nginx-service-${slug_domain_name}
            port:
              number: 443
  - host: www.${domain_name}
    http:
      paths:
      - path: /
        pathType: Prefix
        backend:
          service:
            name: nginx-service-${slug_domain_name}
            port:
              number: 80
      - path: /
        pathType: Prefix
        backend:
          service:
            name: nginx-service-${slug_domain_name}
            port:
              number: 443
  tls:
    - hosts:
      - ${domain_name}
      - www.${domain_name}
      secretName: ${slug_domain_name}-tls
EOL


cat <<EOL > namespace.yaml
apiVersion: v1
kind: Namespace
metadata:
  name: ${name_space}
EOL

cat <<EOL > service.yaml
apiVersion: v1
kind: Service
metadata:
  name: nginx-service-${slug_domain_name}
  namespace: ${name_space}
spec:
  selector:
    app: nginx-basic-${slug_domain_name}
  ports:
    - protocol: TCP
      port: 80
      targetPort: 80
      name: http
    - protocol: TCP
      port: 443
      targetPort: 443
      name: https
  #type: LoadBalancer
---
apiVersion: v1
kind: Service
metadata:
  name: php-service-${slug_domain_name}
  namespace: ${name_space}
spec:
  selector:
    app: php-basic-${slug_domain_name}
  ports:
    - protocol: TCP
      port: 9000
      targetPort: 9000
---
apiVersion: v1
kind: Service
metadata:
  name: redis-service-${slug_domain_name}
  namespace: ${name_space}
spec:
  ports:
  - port: 6379
  selector:
    app: redis-${slug_domain_name}
EOL


cat <<EOL > pvc.yaml
apiVersion: v1
kind: PersistentVolume
metadata:
  name: ${slug_domain_name}-pv
  namespace: ${name_space}-namespace
spec:
  capacity:
    storage: 1Gi
  accessModes:
    - ReadWriteMany
  storageClassName: "nfs-storage"
  nfs:
    path: /home/ubuntu/shared/
    server: 10.7.112.6
---
apiVersion: v1
kind: PersistentVolumeClaim
metadata:
  name: ${slug_domain_name}-pvc
  namespace: ${slug_domain_name}
spec:
  accessModes:
    - ReadWriteMany
  resources:
    requests:
      storage: 1Gi
  storageClassName: "nfs-storage"
EOL

cat <<EOL > prod-env.yaml
apiVersion: v1
kind: ConfigMap
metadata:
  name: laravel-env-${slug_domain_name}
  namespace: ${name_space}
data:
  .env: |
    LOG_CHANNEL=single
    LOG_LEVEL=debug
    BROADCAST_DRIVER=redis
    CACHE_DRIVER=redis
    QUEUE_CONNECTION=redis
    SESSION_DRIVER=redis
    REDIS_HOST=redis-service-${slug_domain_name}
    REDIS_PASSWORD=null
    REDIS_PORT=6379
  REPO_URL: ${repo_url}
EOL

cat <<EOL > init.yaml
apiVersion: cert-manager.io/v1
kind: ClusterIssuer
metadata:
  name: letsencrypt-prod-${slug_domain_name}
spec:
  acme:
    server: https://acme-v02.api.letsencrypt.org/directory
    email: support@${domain_name}
    privateKeySecretRef:
      name: letsencrypt-prod-${slug_domain_name}
    solvers:
    - http01:
        ingress:
          class: "${ingress_name}"
EOL



echo "domain: $domain_name, namespace: $name_space , slug_domain_name: $slug_domain_name, repo_url: $repo_url"

echo "✅ init.yaml"
echo "✅ namespace.yaml"
echo "✅ prod-env.yaml"
echo "✅ deploy.yaml"
echo "✅ ingress.yaml"
echo "✅ pvc.yaml"
echo "✅ service.yaml"

echo "────────⋆⋅☆⋅⋆────────"
echo "🟢 put your .env in prod-env"
echo "🟢 take a genetal look and change configrations as you need"
echo "🟢 deploy your application with this order 👇"
echo "────────⋆⋅☆⋅⋆────────"

echo "👇 👇 👇 👇 👇"
echo "kubectl apply -f init.yaml && \t
kubectl apply -f namespace.yaml && \t
kubectl apply -f prod-env.yaml && \t
kubectl apply -f deploy.yaml && \t
kubectl apply -f service.yaml && \t
kubectl apply -f ingress.yaml"

echo "👇 👇 👇 👇 👇"
echo "Install Helm && Matrix && cert manager"
echo "curl https://raw.githubusercontent.com/helm/helm/master/scripts/get-helm-3 | bash && helm repo add jetstack https://charts.jetstack.io && \t
helm repo add ingress-nginx https://kubernetes.github.io/ingress-nginx && helm repo add stable https://charts.helm.sh/stable && helm repo update && kubectl apply -f https://github.com/kubernetes-sigs/metrics-server/releases/latest/download/components.yaml && helm install cert-manager jetstack/cert-manager --namespace cert-manager --create-namespace --version v1.5.4 --set global.leaderElection.namespace=cert-manager --set installCRDs=true --set prometheus.enabled=false"
 
echo "👇 👇 👇 👇 👇"
echo "Create LoadBalancer"
echo "helm install ${ingress_name} ingress-nginx/ingress-nginx --namespace ${name_space} --create-namespace --version 4.11.1 --values=nginx/values.yaml --set controller.admissionWebhooks.enabled=false"
