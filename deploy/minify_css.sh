#!/bin/sh

version=$2
filename=$1
abs_location="/var/www/opensource/admin_d/release"

uglifycss "$abs_location/$filename" > "$abs_location/t.$filename"

rm "$abs_location/$filename"

mv "$abs_location/t.$filename" "$abs_location/$filename"

cp "$abs_location/$filename" "$abs_location/tttt.$filename"

rm "$abs_location/latest.css"

mv "$abs_location/tttt.$filename" "$abs_location/latest.css"

echo "finished"
