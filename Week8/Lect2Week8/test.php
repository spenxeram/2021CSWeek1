<?php

$sql = "DELETE FROM posts WHERE id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $_GET['post_id']);
    $stmt->execute();

    $sql = "DELETE FROM liked_post WHERE id_post = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $_GET['post_id']);
    $stmt->execute();

    $sql = "DELETE FROM comment_post WHERE post_id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $_GET['post_id']);
    $stmt->execute();
this is what I do (3 times)

I want the sql is
$sql = "DELETE FROM comment_post WHERE post_id = ? ; DELETE FROM post WHERE post_id = ?; DELETE FROM liked _post WHERE post_id = ? ";
separate query by semicolon (;)
    $stmt->bind_param('sss', $_GET['post_id'],$_GET['post_id'],$_GET['post_id']);
……

I have tried it in phpmyadmin in sql, it works but it doesnt in my code :(


 ?>
