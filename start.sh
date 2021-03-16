#!/bin/bash

symfony console doctrine:database:drop --if-exists --force -c main
symfony console doctrine:database:drop --if-exists --force -c master
symfony console doctrine:database:drop --if-exists --force -c commerce

symfony console doctrine:database:create -c main
symfony console doctrine:database:create -c master
symfony console doctrine:database:create -c commerce

symfony console doctrine:schema:create --em main
symfony console doctrine:schema:create --em master
symfony console doctrine:schema:create --em commerce
