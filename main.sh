docker run -dp 3306:3306 --name mydb \
-e MYSQL_USER=umesh \
-e MYSQL_DATABASE=todo \
-e MYSQL_ROOT_PASSWORD=Umesh@123 \
-e MYSQL_PASSWORD=Umesh@123 \
custom-mysql


docker run -d -p 8080:80 --link mydb:mydb --name mywebapp \
-e MYSQL_USER=umesh \
-e MYSQL_DATABASE=todo \
-e DB_HOST=mydb \
-e MYSQL_PASSWORD=Umesh@123 \
custom-php

#change the dir to /code then only run this command
docker run -d -p 8080:80 --link mydb:mydb --name mywebapp -v $(PWD):/var/www/html/ \
-e MYSQL_USER=umesh \
-e MYSQL_DATABASE=todo \
-e DB_HOST=mydb \
-e MYSQL_PASSWORD=Umesh@123 \
custom-php



