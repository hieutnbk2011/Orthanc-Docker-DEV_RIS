# create databases
CREATE DATABASE IF NOT EXISTS `laravel`;
CREATE DATABASE IF NOT EXISTS `uploader_demo`;
CREATE DATABASE IF NOT EXISTS `orthanc_hosts`;

# create root user and grant rights
# CREATE USER 'root'@'localhost' IDENTIFIED BY 'root';
# GRANT ALL PRIVILEGES ON *.* TO 'root'@'%';