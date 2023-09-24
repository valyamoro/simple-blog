<?php
session_start();
function addComment_index() {
    $dataComments = file('storage/comment.txt', FILE_IGNORE_NEW_LINES);
    $dataArticle = file('storage/comment.txt', FILE_IGNORE_NEW_LINES);


    // comment
    $idArticle = $_SESSION['idArticle'];
    $idComment = $dataComments ? (intval(explode('|', end($dataComments))[0]) + 1) : 1;
    $userName = $_POST['user'];
    $textComment = $_POST['comment'];

    $handlerComment = fopen('storage/comment.txt', 'a+b');

    $commentData = "{$idComment}|{$idArticle}|{$userName}|{$textComment}";

    fwrite($handlerComment, $commentData . PHP_EOL);

    flock($handlerComment, LOCK_UN);

}