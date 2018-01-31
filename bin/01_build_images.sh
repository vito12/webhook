#!/bin/sh

echo ""
echo "building containers"
echo ""
echo ""
echo ""
echo ""

docker-compose build 

docker build ./docker/builder -t php_builder

echo ""
echo "setting permissions to storage folders"
echo ""
echo ""
echo ""
echo ""

chmod -R 777 ./storage/