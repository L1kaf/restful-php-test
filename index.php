<?php

header('Content-type: application/json');
require 'connect.php';
require 'functions.php';

$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($request_uri, '/'));

$type = $parts[0];
$id = $parts[1];

if ($type === 'posts') {
    if (isset($id)) {
        getPost($connect, $id);
    } else {
        getPosts($connect); 
    }    
}



