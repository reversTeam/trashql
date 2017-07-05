#!/usr/bin/env bash

composer install -o
php /var/www/html/bin/console server:run $1:$2
