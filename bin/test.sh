#!/bin/sh
 case "$OSTYPE" in
   msys*)    echo "Windows" ;;
   *)        echo "unknown: $OSTYPE" ;;
 esac

  case "$OSTYPE" in
   msys*)    STR=$(pwd -W) ;;
   *)        STR=$(pwd) ;;
 esac
 
docker run -ti \
	-v $STR:/wa \
	php_builder bash -ci "