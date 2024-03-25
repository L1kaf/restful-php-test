<?php

header('Content-type: json/application');
require 'connect.php';

$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', $request_uri);

$path = end($parts);

if ($path === 'posts') {
    $posts = pg_query($connect, "SELECT * FROM posts;");
    $postsList = [];
    while($post = pg_fetch_assoc($posts)) {
        $postsList[] = $post;
    }

    echo json_encode($postsList);
}



