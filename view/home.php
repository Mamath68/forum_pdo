<?php ob_start()
    ?>
<h1>BIENVENUE SUR LE FORUM</h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ut nemo quia voluptas numquam, itaque ipsa soluta
    ratione eum temporibus aliquid, facere rerum in laborum debitis labore aliquam ullam cumque.</p>

<p>
    <a href="view/security/login.php">Se connecter</a>
    <span>&nbsp;-&nbsp;</span>
    <a href="view/security/register.php">S'inscrire</a>
</p>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php

$contenu = ob_get_clean(); //temporisation de sortie
require("layout.php");