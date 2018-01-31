#!/bin/sh

echo ""
echo "starting containers"
echo ""
echo ""
echo ""
echo ""
echo "Ricordati di inserire nel file hosts queste entry"
echo ""
echo "127.0.0.1 local.auth.gupcommerce.it"
echo ""
echo ""
echo ""
echo "per spegnere tutti i container"
echo "fai ctrl+c"
echo "oppure"
echo "> docker-compose down"
echo ""
echo ""
echo ""


# cp ./.env.example ./.env


echo "faccio partire il container con mysql"
docker-compose up -d mysql

echo "faccio partire i container con PHP FPM"
docker-compose up -d gestionecode-php gestionecode-queue-worker

echo "faccio partire il container NGINX WebServer"
docker-compose up -d front


# echo "faccio partire il container kibana"
# docker-compose up -d kibana

echo "faccio restart dei queue worker"
docker-compose up queue_restart

 # case "$OSTYPE" in
 #   msys*)    STR=$(pwd -W) ;;
 #   *)        STR=$(pwd) ;;
 # esac
