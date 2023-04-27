<?php

$categorys = $result["data"]['categorys'];

?>

<h1>Liste des Catégorie</h1>

<?php
foreach ($categorys as $category) {

    ?>
    <p>
        <?= $category->getId() ?>
    </p>
    <p>
        <?= $category->getTitle() ?>
    </p>
    <p>
        <?= $category->getCreationDate() ?>
    </p>
    <?php
}