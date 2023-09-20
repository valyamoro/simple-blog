<?php
error_reporting(0);
include_once 'dbConnect.php';

    $topics = file($categoryPath, FILE_IGNORE_NEW_LINES);
    foreach ($topics as $q) {
        $topicData = explode('|', $q);
        $topicsData[] = $topicData;
    }
    ?>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">Navbar</a>
                <ul class="navbar-nav mr-auto">
                    <?php
                    // Создаём список категорий в меню
                    foreach($topicsData as $topic) {
                        // Выводим элемент списка
                        echo '<li class="nav-item"><a class="nav-link" href="generation.php?id_topic='. $topic[0] .'">'.$topic[1].'</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
    <?php

$posts = file($articlePath, FILE_IGNORE_NEW_LINES);
if (!empty($posts)) {
    foreach ($posts as $q) {
        $postsData = explode('|', $q);
        $allPostsData[] = $postsData;
        if ($_GET['id_topic'] === $postsData[3]) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" ><a href="generation.php?id_article=<?= $postsData[0] ?>"><?= $postsData[1] ?></a></h5>
<!--                    <h5 class="card-title" ><a href="../post.php?id_article="--><?php //= $postsData[0] ?><!--">--><?php //= $postsData[1] ?><!--</a></h5>-->
                    <p class="card-text"><?= mb_substr($postsData[2], 0, 158, 'UTF-8') ?></p>
                </div>
            </div>
            <?php

        }
        $idArticle = $_GET['id_article'];
    }
} else {
    echo 'Нет статей';

}

    if (!empty($idArticle)) {
        foreach ($allPostsData as $needPost) {
            if ($needPost[0] === $idArticle) {
                $needPostInfo = $needPost;
            }
        }
    }
    ?>
    <?php
if (!empty($_GET)) {
    ?>
    <h1><?= $needPostInfo[1] ?></h1>
    <p><?= $needPostInfo[2] ?></p>
    <p>Дата публикации: <?= substr($needPostInfo[4], 0, 11) ?></p>
    <?php
}

$comment = file($commentPath, FILE_IGNORE_NEW_LINES);

foreach ($comment as $q) {
    $commentData = explode('|', $q);

    // Проверяем, соответствует ли комментарий выбранной статье (по id_article)
    if ($commentData[2] == $idArticle) {
        ?>
        <div class="comment">
            <p><b><?= $commentData[1] ?></b></p>
            <p>Оставлен: <?= substr($commentData[3], 0, 11) ?></p>
        </div>
        <hr>
        <?php
    }
}


