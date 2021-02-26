#!/bin/sh
DEPLOYPATH=/home/shfcoid/webtest.shf.co.id

shopt -s extglob  # to enable extglob

cp -rf !(index.php) $DEPLOYPATH/public/*   $DEPLOYPATH/
mv -f $DEPLOYPATH/index.php.server $DEPLOYPATH/index.php

shopt -u extglob # disable extglob