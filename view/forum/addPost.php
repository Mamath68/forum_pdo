<?php
$topic = $result["data"]['topic'];
?>

<div class="Formulaire">
    <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="post">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Entrez Votre Message</label>
            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Repondre">
    </form>
</div>