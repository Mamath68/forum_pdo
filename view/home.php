<?php

if (App\Session::isAdmin()) {
?>
    <div class="text-center mt-5">

        <h1>Bienvenue Administrateur</h1>
        <p>Vous pouvez désormais Créer vos Catégories, sujets de conversation, poster des messages, et gérer les
            utilisateurs. <br> Vous pouvez par exemple, bannir les utilisateurs ayant enfreins les <a href="index.php?ctrl=home&action=forumRules" target="_blank">Règles du forum</a></p>
    </div>
<?php
} else if (App\Session::getUser()) {
?>
    <div class="text-center mt-5">
        <h1>Bienvenue sur votre Forum Favoris</h1>
        <p>Vous pouvez désormais poser vos questions, répondre aux questions déjà
            présente, ou simplement créer un nouveau sujet de conversation, si vous ne trouvez pas votre bonheur.</p>
    </div>
<?php
} else {
?>
    <div class="text-center mt-5">
        <h1>Bienvenue Sur ce forum</h1>
        <p>Ici, Vous pouvez choisir un thème(Catégorie), sélectionner un sujet de
            conversation, <br> et trouvez les réponses aux questions que vous cherchez. <br>
            Seulement, pour poser vos questions(ou répondre à une question déjà présente), vous devrez créer un compte et vous
            connecter.</p>
        <p>
            <a href="index.php?ctrl=security&action=loginForm">Se connecter</a>
            <span>&nbsp;-&nbsp;</span>
            <a href="index.php?ctrl=security&action=registerForm">S'inscrire</a>
        </p>
    </div>
<?php
}

$title = "Accueil";
