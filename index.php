<?php

header('Content-type: application/json');
require 'connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($request_uri, '/'));

$type = $parts[0];
$id = $parts[1];


switch ($method) {
    case 'GET':
        switch ($type) {
            case 'posts':
                if (isset($id)) {
                    getPost($connect, $id);
                } else {
                    getPosts($connect);
                }
                break;
        }
        break;
    
    case 'POST':
        switch ($type) {
            case 'posts':
                addPost($connect, $_POST);
                break;
        }
        break;
}
