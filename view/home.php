<?php

if (App\Session::isAdmin()) {
    ?>
    <h1 style="padding-top:15%">Bienvenue Administrateur</h1>
    <p class="p" style="padding-bottom:16.6%;">Vous pouvez désormais Créer vos Catégories, sujets de conversation, poster
        des messages, et gérer les
        utilisateurs. <br> Vous pouvez par exemple, bannir les utilisateurs ayant enfreins les <a
            href="index.php?ctrl=home&action=forumRules" target="_blank">Règles du forum</a></p>
    <?php
} else if (App\Session::getUser()) {
    ?>
        <h1 style="padding-top:15%">Bienvenue sur votre Forum Favoris</h1>
        <p class="p" style="padding-bottom:18.2%;">Vous pouvez désormais poser vos questions, répondre aux questions déjà
            présente, ou simplement créer un nouveau sujet de conversation, si vous ne trouvez pas votre bonheur.</p>
    <?php
} else {
    ?>
        <h1 style="padding-top:13.5%">Bienvenue Sur ce forum</h1>
        <p class="p" style="padding-bottom:5%;">Ici, Vous pouvez choisir un thème(Catégorie), sélectionner un sujet de
            conversation, <br> et trouvez les réponses aux questions que vous cherchez. <br>
            Seulement, pour poser vos questions(ou répondre à une question déjà présente), vous devrez créer un compte et vous
            connecter.</p>
        <p class="p">
            <a href="index.php?ctrl=security&action=loginForm">Se connecter</a>
            <span>&nbsp;-&nbsp;</span>
            <a href="index.php?ctrl=security&action=registerForm">S'inscrire</a>
        </p>
    <?php
}