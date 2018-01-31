#!/bin/sh

echo ""
echo "clear all containers"
echo ""
echo ""
echo ""
echo ""

echo 'Stop all containers'
CONTAINERS=$(docker ps -aq)

for container in $CONTAINERS;
do
    docker stop $container
done

echo 'Remove all containers'
CONTAINERS=$(docker ps -aq)

for container in $CONTAINERS;
do
    docker rm $container
done
