<?php
include_once 'dbConnect.php';

function generation_head_menu()
{
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
                    echo '<li class="nav-item"><a class="nav-link" href="./topic.php?id_topic='. $topic[0] .'">'.$topic[1].'</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <?php
}

function generation_posts_index() {
    $posts = file($articlePath, FILE_IGNORE_NEW_LINES);

    foreach ($posts as $q) {
        $postsData = explode('|', $q);
        $postsData[] = $postsData;
    }
    if (!empty($postsData)) {
        foreach ($postsData as $post) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" ><a href="post.php?id_article=<?= $post['id'] ?>"><?= $post['title'] ?></a></h5>
                    <p class="card-text"><?= mb_substr($post['text'], 0, 158, 'UTF-8') ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo 'Нет статей';
    }
}
$posts = file($articlePath, FILE_IGNORE_NEW_LINES);
foreach ($posts as $q) {
    $postsData = explode('|', $q);
    $postsData[] = $postsData;
}
if (!empty($postsData)) {
    foreach ($postsData as $post) {
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" ><a href="post.php?id_article=<?= $post['id'] ?>"><?= $post['title'] ?></a></h5>
                <p class="card-text"><?= mb_substr($post['text'], 0, 158, 'UTF-8') ?></p>
            </div>
        </div>
        <?php
    }
} else {
    echo 'Нет статей';
}