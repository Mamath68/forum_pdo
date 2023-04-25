<h1>Register Form</h1>

<?php
?>
<form action="index.php?ctrl=security&action=register" method="post" enctype="multipart">

    <input type="text" name="pseudo" id="pseudo" placeholder="pseudo" required>
    <input type="email" name="email" id="email" placeholder="Email" required>
    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
    <input type="password" name="confirmepassword" id="password" placeholder="Confirmer Mot de passe" required>

    <button type="submit">Enregistrer</button>
</form>