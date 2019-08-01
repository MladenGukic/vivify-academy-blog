<?php
include "db.php";

if(!empty($_POST['title']) && !empty($_POST['post']) && !empty($_POST['author'])) {
    $title = $_POST['title'];
    $post = $_POST['post'];
    $author = $_POST['author'];
    $date = date('Y-m-d H:i:s');
$sqlAddPost = "INSERT INTO posts(title, body, author, created_at) VALUES ('{$title}', '{$post}', '{$author}', '{$date}')";
$statementAddPost = $connection->prepare($sqlAddPost);
$statementAddPost->execute();
$statementAddPost->setFetchMode(PDO::FETCH_ASSOC);

header("Location: http://localhost:8080/index.php");
} else {
    header("Location: http://localhost:8080/create.php?&error=1");
}
?>