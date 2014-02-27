#!/usr/bin/env bash

#UPDATE APT REPO
apt-get update
apt-get dist-upgrade

#INSTALL SERVICES
apt-get install -y apache2 php5

#SET THE WWW DIRECTORY
rm -rf /var/www
ln -s /vagrant/webroot /var/www

#RESTART APACHE
service apache2 restart