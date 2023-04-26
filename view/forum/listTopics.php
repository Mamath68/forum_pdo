<?php

$topics = $result["data"]['topics'];

?>

<h1>Liste des Sujets</h1>

<?php
foreach ($topics as $topic) {

    ?>
    <p><?= $topic->getId() ?></p>
    <p><?= $topic->getTitle() ?></p>
    <p><?= $topic->getBody() ?></p>
    <p><?= $topic->getUser() ?></p>
    <p><?= $topic->getCategory() ?></p>
    <p><?= $topic->getCreationdate() ?></p>
    <?php
}