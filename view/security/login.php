<h1>Form Connexion</h1>

<form action="index.php?ctrl=security&action=login" method="post" enctype="multipart">

    <div class="mb-3">
        <label for="pseudo " class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>