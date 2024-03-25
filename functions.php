<?php

function getPosts($connect) {
    $posts = pg_query($connect, "SELECT * FROM posts");
    $postsList = [];
    while($post = pg_fetch_assoc($posts)) {
        $postsList[] = $post;
    }

    echo json_encode($postsList);
}

function getPost($connect, $id) {
    $post = pg_query($connect, "SELECT * FROM posts WHERE id = '$id'");
    $post = pg_fetch_assoc($post);
    echo json_encode($post);
}