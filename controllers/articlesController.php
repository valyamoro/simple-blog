<?php

function articles_index() {
    $articleData = file('storage/article.txt');

    $category = 'популярные';
    if (isset($_GET['catg'])) {
        $category = $_GET['catg'];
    }

    $result = [];
    foreach ($articleData as $q) {
        $article = explode('|', $q);

        if ($category === 'популярные' || $article['1'] === $category) {
            $articleInfo[] = [
                'id' => $article['0'],
                'category' => $article['1'],
                'name' => $article['2'],
                'text' => $article['3'],

            ];
        }
    }

    return ['articles' => $articleInfo, 'category' => $category];
}

function articles_view() {
    $id = $_GET['id'];

    $items = file('storage/article.txt');

    $result = NULL;
    foreach ($items as $item) {
        $article = explode('|', $item);

        if ($id == $article['0']) {
            $result = [
                'id' => $article['0'],
                'category' => $article['1'],
                'name' => $article['2'],
                'text' => $article['3'],
            ];
        }
    }
    $commentData = file('storage/comment.txt');

    foreach ($commentData as $item) {
        $comment = explode('|', $item);

        if ($comment[1] == $_GET['id']) {
            $commentInfo = [
                'id' => $comment['0'],
                'idArticle' => $comment['1'],
                'username' => $comment['2'],
                'text' => $comment['3'],

            ];
        }

    }
    return ['article' => $result, 'comments' => $commentInfo];
}