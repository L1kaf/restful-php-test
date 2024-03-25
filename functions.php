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

function addPost($connect, $data) {

    $title = $data['title'];
    $body = $data['body'];

    $post = pg_query($connect, "INSERT INTO posts (title, body) VALUES ('$title', '$body') RETURNING id");

    http_response_code(201);

    $insert_row = pg_fetch_row($post);
    $insert_id = $insert_row[0];
 

    $res = [
        'status' => true,
        'post_id' => $insert_id
 
    ];

    echo json_encode($res);
}