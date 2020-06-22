FROM php:apache
LABEL maintainer="Bamdad Sabbagh <devops@bamdadsabbagh.com>"

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get autoremove --purge -y && \
    apt-get install -y \
    libapache2-mod-security2

RUN a2enmod rewrite

COPY src/ /var/www/html

# apache2 production mode
COPY docker/apache2.conf /root/apache2.conf
RUN cat /root/apache2.conf >> /etc/apache2/apache2.conf \
    && rm /root/apache2.conf

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
