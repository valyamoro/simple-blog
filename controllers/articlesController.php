<?php

function articles_index() {
    $text = file_get_contents('db.txt');

    $items = explode('-*-', $text);

    $category = 'популярное';
    if (isset($_GET['catg'])) {
        $category = $_GET['catg'];
    }

    $result = [];
    foreach ($items as $item) {
        $article = explode('|', $item);

        if ($category === 'Популярные' || $article['1'] === $category) {
            $result = [
                'id' => $article['0'],
                'category' => $article['1'],
                'text' => $article['2']
            ];
        }
    }
    return ['articles' => $result, 'category' => $category];
}

function articles_view() {
    $id = $_GET['id'];
    $text = file_get_contents('db.txt');
    $items = explode('-*-', $text);
    $result = NULL;

    foreach ($items as $item) {
        $article = explode('|', $item);

        if ($id == $article['0']) {
            $result = [
                'id' => $article['0'],
                'category' => $article['1'],
                'text' => $article['2'],
            ];
        }
    }
    return ['article' => $result];
}
