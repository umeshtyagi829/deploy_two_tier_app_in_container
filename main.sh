#!/bin/bash

sudo docker stop mydb
sudo docker rm mydb
                
sudo docker stop mywebapp
sudo docker rm mywebapp

sudo docker run -dp 3306:3306 --name mydb \
-e MYSQL_USER=$MYSQL_CREDENTIALS_USR \
-e MYSQL_DATABASE=todo \
-e MYSQL_ROOT_PASSWORD=$MYSQL_ROOT_PASSWORD \
-e MYSQL_PASSWORD=$MYSQL_CREDENTIALS_PSW \
mysql_by_jenkins

sudo docker run -d -p 8000:80 --link mydb:mydb --name mywebapp \
-e MYSQL_USER=$MYSQL_CREDENTIALS_USR \
-e MYSQL_DATABASE=todo \
-e DB_HOST=mydb \
-e MYSQL_PASSWORD=$MYSQL_CREDENTIALS_PSW \
php_by_jenkins
