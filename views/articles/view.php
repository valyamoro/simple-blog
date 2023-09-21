<h1>Статья с id <?=$article['id']; ?> </h1>
<hr>
<?= $article['text']; ?>
<hr>
<a href="<?=$_SERVER['HTTP_REFERER']; ?>">Назад</a>

<?php

foreach($comments as $comment) {
    echo $comment;
}
