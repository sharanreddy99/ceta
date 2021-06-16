FROM php:7.0-apache

RUN apt-get update && apt-get install zip -y && \
    cd /var/www/html && docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli && \
    (curl -sS "https://getcomposer.org/installer" | php) && \
    php composer.phar require robmorgan/phinx && \
    php composer.phar install

COPY . /var/www/html
RUN ["chmod","+x","/var/www/html/start.sh"]

#Run migrations
CMD ["/var/www/html/start.sh"]

