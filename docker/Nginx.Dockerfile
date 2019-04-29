FROM nginx

ADD docker/conf/vhost.conf /etc/nginx/donf.d/default.conf

WORKDIR /var/www/salametcom