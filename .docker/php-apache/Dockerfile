FROM php:5-apache
MAINTAINER Dolyveen Renault <d.renault@karudev-informatique.fr>

COPY etc/php/php.ini /usr/local/etc/php
RUN a2enmod rewrite

# Install vim..
RUN apt-get update && apt-get install -y vim \
    wget \
    git

# Install pdo_mysql, zip, soap, mysqli
RUN docker-php-ext-install pdo \
  pdo_mysql

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php composer-setup.php --install-dir=/usr/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"
# Install PHPUNIT
RUN wget https://phar.phpunit.de/phpunit-6.5.phar \
    && chmod +x phpunit-6.5.phar \
	&& mv phpunit-6.5.phar /usr/local/bin/phpunit

