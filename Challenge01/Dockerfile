FROM ubuntu:20.04
MAINTAINER <@TheXC3LL> 


ENV TZ=Europe/Madrid
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

EXPOSE 80/tcp
RUN apt-get update && apt-get upgrade -y && apt-get install -y apache2 php libapache2-mod-php
COPY files/index.php /var/www/html/index.php
COPY files/flag /flag
COPY files/php.ini /etc/php/7.4/apache2/php.ini
COPY entrypoint.sh /entrypoint.sh
RUN ["chmod", "+x", "/entrypoint.sh"]
RUN ["mkdir", "/var/www/html/files"]
RUN ["chown", "-R", "www-data:www-data", "/var/www/html/files"]
RUN ["touch","/var/www/html/files/index.php"]
RUN ["rm", "/var/www/html/index.html"]
CMD ["/entrypoint.sh"]
