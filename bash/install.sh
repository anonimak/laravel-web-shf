#!/bin/sh
DEPLOYPATH=/home/shfcoid/webtest.shf.co.id

shopt -s extglob  # to enable extglob

cp -rf !(index.php) $DEPLOYPATH/public/*   $DEPLOYPATH/

shopt -u extglob # disable extglob