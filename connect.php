<?php

$connect = pg_connect("host='127.0.0.1' dbname='api_test' user='likaf' password='Qwertas321'");

if (!$connect) {
    echo "Ошибка подключения к базе данных: " . pg_last_error();
    exit;
}