#!/bin/sh

#--------------------------------------------------------------------------
# 🚀 Importing Database...
#--------------------------------------------------------------------------
export MYSQL_ROOT_USER="root"
export MYSQL_ROOT_PASSWORD="root"

cd /var/db;

mysql --user=$MYSQL_ROOT_USER --password=$MYSQL_ROOT_PASSWORD -e "DROP DATABASE IF EXISTS weintegral;";

mysql --user=$MYSQL_ROOT_USER --password=$MYSQL_ROOT_PASSWORD -e "CREATE DATABASE IF NOT EXISTS weintegral;";

pv --progress -t -e -r -a /var/db/weintegral.sql | mysql --user=$MYSQL_ROOT_USER --password=$MYSQL_ROOT_PASSWORD weintegral;