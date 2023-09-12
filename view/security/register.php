<h1>Register Form</h1>

<form action="index.php?ctrl=security&action=register" method="post" enctype="multipart">

    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Password</label>
        <input type="password" name="confirmpassword" id="password" placeholder="Confirmer Mot de passe" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary reject">Enregistrer</button>
</form>
<button type="submit" class="btn btn-success reject2"><a class="href" href="index.php?ctrl=security&action=loginForm">Déja un
        compte? Se connecter</a> </button>

<?php
$title = "S'enregistrer";

?>