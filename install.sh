#!/usr/bin/bash

echo -e "\n ==== Update and upgrade packages ====\n"
sudo apt update -y && sudo apt upgrade -y

echo -e "\n ==== Install LAMP stack ====\n"
sudo apt install apache2 libapache2-mod-php php php-mbstring php-common php-curl php-dev php-gd php-pear composer -y

echo -e "\n ==== Permissions for /var/www\n"
sudo chown -R www-data:www-data /var/www

echo -e "\n ==== Enable Modules ==== \n"
sudo a2enmod rewrite

echo -e "\n ===== Restart apache2 service ====\n"
sudo service apache2 restart

exit 0