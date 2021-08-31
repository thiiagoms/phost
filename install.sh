#!/bin/bash

echo -e "[*] Update and upgrade distro"
sudo apt update -y && sudo apt upgrade -y

echo -e "[*] Install Apache2, PHP and Composer packages"
sudo apt install apache2 libapache2-mod-php php composer php-zip -y