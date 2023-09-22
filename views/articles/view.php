<?php session_start() ?>
<h1>Статья с id <?=$article['id'] ?> </h1>
<hr>
<?= $article['text']; ?>
<hr>
<a href="<?=$_SERVER['HTTP_REFERER']; ?>">Назад </a>

<?php $idArticle = $_GET['id'] ?>
<?php $_SESSION['idArticle'] = $idArticle ?>

<form action="?c=addComment&a=index&id="<?= $idArticle ?> method="POST">
    Ник <input type="text" name="user"> <br>
    Комментарий <input type="text" name="comment"> <br>
    <input type="submit" value="Отправить">
</form>
<?php
foreach ($comments as $comment) {
    echo '<br>';
    echo "Ник: {$comment['username']} <br>";
    echo "Комментарий: {$comment['text']} <br>";
    echo '---------------------------';
}

?>

