#!/usr/bin/env bash

cp .env .env.example
docker-compose up -d --build
docker exec wayni_app composer install