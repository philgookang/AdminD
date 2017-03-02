#!/bin/sh

version=$2
filename=$1
abs_location="/var/www/mugmox/admin_d/release"

uglifyjs "$abs_location/$filename" --compress --mangle --output "$abs_location/t.$filename"

rm "$abs_location/$filename"

mv "$abs_location/t.$filename" "$abs_location/$filename"

echo "finished"
