#!/bin/bash

echo -e "\n ==== Remove LAMPP packages ====\n"
sudo apt remove --purge apache2 libapache2-mod-php php php-mbstring php-common php-curl php-dev php-gd php-pear composer -y
sudo apt autoremove -y && sudo apt autoclean -y
