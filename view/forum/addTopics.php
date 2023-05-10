<?php
$category = $result["data"]['category'];

?>

<div class="Formulaire">
    <form action="index.php?ctrl=forum&action=addTopic&id=<?=$category->getId()?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titre du sujet</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Entrez Votre titre">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>