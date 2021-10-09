FROM mariadb:latest as builder
RUN ["sed", "-i", "s/exec \"$@\"/echo \"not running $@\"/", "/usr/local/bin/docker-entrypoint.sh"]
ENV MYSQL_ROOT_PASSWORD=example
COPY setup.sql /docker-entrypoint-initdb.d/
RUN ["/usr/local/bin/docker-entrypoint.sh", "mysqld", "--datadir", "/initialized-db", "--aria-log-dir-path", "/initialized-db"]
FROM mariadb:latest
COPY --from=builder /initialized-db /var/lib/mysql
RUN apt update -y && apt upgrade -y
RUN apt install apache2 -y
RUN apt install php -y
ADD ports.conf /etc/apache2/ports.conf
RUN rm -rf /var/www/html
ADD html /var/www/html