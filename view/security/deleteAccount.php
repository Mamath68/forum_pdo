<section class="delete container">

    <h1>Suppression de Compte</h1>

    <h3>Vous vous apprêtez a supprimer votre compte</h3>
    <p>Cette action est définitive</p>

    <div class="separate">
        <button type="button" class="btn btn-warning m-3 p-3"><a class="link-dark" href="#">Confirmer</a></button>
        <button type="button" class="btn btn-secondary m-3 p-3"><a class="link-light"
                href="index.php?ctrl=home&action=detailUser&id=<?= App\Session::getUser()->getId() ?>">Annuler</a></button>
    </div>
</section>
<?php
$title = "Suppression du Compte de " . App\Session::getUser()->getPseudo();
?>