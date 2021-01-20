#!/bin/bash
set -x

#Deployment script

#deploypath here
DEPLOYPATH=/home/shfcoid/webtest.shf.co.id

# Change to the project directory
cd $DEPLOYPATH

# Turn on maintenance mode
php artisan down

# Install/update composer dependecies
composer install --no-interaction --optimize-autoloader
composer dump-autoload

# Set env
cp $DEPLOYPATH/.env.webtest $DEPLOYPATH/.env

# Run database migrations
php artisan migrate --force --seed

# Run database seeders
#php artisan db:seed --class=NxxxxXxxxxYyy

# Clear caches
php artisan cache:clear

# Clear expired password reset tokens
php artisan auth:clear-resets

# Clear and cache routes
php artisan route:clear
php artisan route:cache

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Clear view
php artisan view:clear

# Create Symlink
php artisan storage:link

# Install node modules
npm install

# Run dev
npm run dev

# copy all file public to root
cp -rf $DEPLOYPATH/public/* $DEPLOYPATH

# replace index.php
mv -f $DEPLOYPATH/index.php.server $DEPLOYPATH/index.php

# Build assets using Laravel Mix
#gulp --scope=all --production
#gulp --scope=all

# Turn off maintenance mode
php artisan up