<?php
$category = $result["data"]["category"];
var_dump($result);
?>
<div class="Formulaire">
    <form action="index.php?ctrl=forum&action=addTopic" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titre du sujet</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Entrez Votre titre">
            <input type="hidden" name="id" value="<?= $category->getId() ?>">
        </div>
        <input type="submit" value="Envoyer" class="btn btn-primary" name="submit">p
    </form>
</div>