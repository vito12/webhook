#!/bin/sh

echo ""
echo "stopping containers"
echo ""
echo ""
echo ""
echo ""


docker-compose down

# Stop eventually all running containers

CONTAINERS=$(docker ps -aq)

for container in $CONTAINERS;
do
    docker stop $container
done