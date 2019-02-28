FROM centos:7

RUN yum update -y \
    && yum install -y epel-release yum-utils unzip \
    && yum clean all

RUN yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    && yum-config-manager --enable remi-php73 \
    && yum update -y \
    && yum install -y php-bcmath \
        php-cli \
        php-common \
        php-curl \
        php-fpm \
        php-gd \
        php-intl \
        php-json \
        php-mbstring \
        php-mcrypt \
        php-mysql \
        php-opcache \
        php-pecl-apcu \
        php-tidy \
        php-xml \
        php-zip \
        php-xdebug \
    && yum clean all

RUN adduser --uid 1000 --create-home pug \
    && mkdir -p /srv/www/{website,opcache} \
    && chown -R pug:pug /srv/www \
    && curl --silent --show-error https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer \
        --version=1.8.3

COPY configs/php-fpm.conf /etc/
COPY configs/www.conf /etc/php-fpm.d/
COPY configs/99-* /etc/php.d/
COPY scripts/* /home/pug/.scripts/

RUN chmod -R 755 /home/pug/.scripts/*

VOLUME ["/srv/www/website"]
WORKDIR /srv/www/website
USER pug

CMD ["/home/pug/.scripts/entrypoint.sh"]

EXPOSE 9000 9999