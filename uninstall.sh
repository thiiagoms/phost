#!/bin/bash

echo -e "[*] Remove Apache2, PHP and Composer packages"
sudo apt remove --purge apache2 libapache2-mod-php composer -y 

echo -e "[*] Clean"
sudo apt autoremove -y && sudo apt autoclean -y