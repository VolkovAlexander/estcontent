FROM php:7.3-fpm

MAINTAINER Alexander Volkov <volkkb@gmail.com>

RUN apt-get update \
  && apt-get install -y nginx \
  && apt-get install -y git \
  && apt-get install -y imagemagick libmagickwand-dev libmagickcore-dev \
  && apt-get install -y libcurl4-gnutls-dev libicu-dev libxslt-dev libssl-dev \
  && apt-get install -y libzip-dev; \
  docker-php-ext-install -j$(nproc) iconv mysqli pdo_mysql gd zip curl bcmath opcache mbstring \
    && docker-php-ext-install -j$(nproc) curl json intl session xmlrpc xsl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable iconv pdo_mysql gd zip curl bcmath opcache mbstring \
    && docker-php-ext-enable curl json intl session xmlrpc xsl; \
      pecl install imagick \
      && docker-php-ext-enable imagick; \
      apt-get autoremove -y

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

# Set timezone
RUN rm /etc/localtime && ln -s /usr/share/zoneinfo/UTC /etc/localtime && "date"

COPY nginx.conf /etc/nginx/sites-enabled/default
COPY entrypoint.sh /etc/entrypoint.sh
RUN chmod a+x /etc/entrypoint.sh

WORKDIR /var/www
COPY ./php.conf /usr/local/etc/php-fpm.d/zz-docker.conf

EXPOSE 8888

ENTRYPOINT ["/etc/entrypoint.sh"]