#!/bin/bash
/usr/local/bin/wait-for-mysql mysql
php artisan migrate
php-fpm