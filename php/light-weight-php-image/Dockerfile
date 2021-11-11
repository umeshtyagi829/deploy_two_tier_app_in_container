#FROM ubuntu:20.04

FROM alpine:3.14


LABEL maintener="Vipin"

#WORKDIR /var/www/html

#RUN apt update -y \
# && DEBIAN_FRONTEND=noninteractive apt install -yq apache2 php php-mysqlnd php-mbstring php-opcache php-gd vim

#RUN  apk update && \
#apk add --no-cache  apache2 php7 php7-mysqlnd php7-mbstring php7-opcache php7-gd vim

RUN apk update \
 && apk add apache2 php7 php7-mysqlnd php7-mbstring php7-opcache php7-gd vim

COPY . .

EXPOSE 80/tcp

CMD [ "httpd","-D","FOREGROUND"]
