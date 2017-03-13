#!/bin/sh

version=$2
filename=$1
abs_location="/var/www/opensource/admin_d/release"

uglifyjs "$abs_location/$filename" --compress --mangle --output "$abs_location/t.$filename"

rm "$abs_location/$filename"

mv "$abs_location/t.$filename" "$abs_location/$filename"

cp  "$abs_location/$filename"  "$abs_location/ttt.$filename"

rm "$abs_location/latest.js"

mv "$abs_location/ttt.$filename" "$abs_location/latest.js"


echo "finished"
