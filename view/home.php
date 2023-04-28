<h1>BIENVENUE SUR LE FORUM</h1>

<?php
if (App\Session::getUser()) {
    ?>
    <p class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ut nemo quia voluptas numquam, itaque ipsa
        soluta
        ratione eum temporibus aliquid, facere rerum in laborum debitis labore aliquam ullam cumque.</p>
    <?php
} else {
    ?>
    <p class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ut nemo quia voluptas numquam, itaque ipsa
        soluta
        ratione eum temporibus aliquid, facere rerum in laborum debitis labore aliquam ullam cumque.</p>
    <p class="p">
        <a href="index.php?ctrl=security&action=loginForm">Se connecter</a>
        <span>&nbsp;-&nbsp;</span>
        <a href="index.php?ctrl=security&action=registerForm">S'inscrire</a>
    </p>
    <?php
}