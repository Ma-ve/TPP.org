#!/bin/bash

function headLine {
    END=60

    for ((i=1; i<=END; i++));
    do
        echo -n "#"
    done
    echo
}

function inlineLine {
    for ((i=1; i<=$1; i++));
    do
        echo -n "#"
    done
}

function echoUpdate {
    headLine

    SIZE=${#1}
    FISIZE=$(((($END-$SIZE)/2)-1))

    inlineLine FISIZE

    if [ $((SIZE%2)) -eq 1 ];
    then
        echo -n "#"
    fi

    echo -e -n " \e[93m$1\e[39m "

    inlineLine FISIZE

    echo
    headLine

    eval $1
    echo
}

echoUpdate "git pull"
#git pull
#echo

echoUpdate "composer install -o"
#composer install -o
#echo

echoUpdate "vendor/bin/phinx migrate"
#vendor/bin/phinx migrate
#echo

