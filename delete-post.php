<?php
include "db.php";

$id = $_GET['id'];

$sqlDelCom = "DELETE FROM comments WHERE post_id = $id";
$statementDelCom = $connection->prepare($sqlDelCom);
$statementDelCom->execute();
$statementDelCom->setFetchMode(PDO::FETCH_ASSOC);

$sqlDel = "DELETE FROM posts WHERE id = $id";
$statementDelete = $connection->prepare($sqlDel);
$statementDelete->execute();
$statementDelete->setFetchMode(PDO::FETCH_ASSOC);

header("Location: http://localhost:8080/index.php");
?>