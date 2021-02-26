#!/bin/sh
DEPLOYPATH=/home/shfcoid/webtest.shf.co.id

shopt -s extglob  # to enable extglob

cp -rf !(index.php|storage) $DEPLOYPATH/public/*   $DEPLOYPATH/
$DEPLOYPATH/php artisan storage:link

shopt -u extglob # disable extglob