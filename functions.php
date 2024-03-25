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

    if (pg_num_rows($post) === 0) {
        http_response_code(404);
        $res = [
            'status' => false,
            'message' => 'Post not found'
        ];
        echo json_encode($res);
    } else {
        $post = pg_fetch_assoc($post);
        echo json_encode($post);
    }
}