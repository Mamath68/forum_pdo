<?php

$posts = $result["data"]['posts'];

?>

<h1>Liste des Messages</h1>

<?php
foreach ($posts as $post) {

    ?>
    <p>
        <?= $post->getId() ?>
    </p>
    <p>
        <?= $post->getBody() ?>
    </p>
    <p>
        <?= $post->getCreationDate() ?>
    </p>
    <p>
        <?= $post->getTopic() ?>
    </p>
    <p>
        <?= $post->getUser() ?>
    </p>
    <?php
}