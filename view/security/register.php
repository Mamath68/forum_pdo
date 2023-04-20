<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Enregistrer</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                // Your message code
                if (isset($_SESSION['message'])) {
                    echo '<h4 class="alert alert-warning">' . $_SESSION['message'] . '</h4>';
                    unset($_SESSION['message']);
                } // Your message code
                ?>
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Enregistrer</h4>
                    </div>
                    <div class="card-body">

                        <form action="register_code.php" method="POST">

                            <div class="mb-3">
                                <label>Pseudo</label>
                                <input type="text" name="pseudo" required placeholder="Enter Username"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="addresse_mail" required placeholder="Enter Email Address"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mot de passe</label>
                                <input type="password" name="mot_passe" required placeholder="Enter Password"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Confirmer le Mot de passe</label>
                                <input type="password" name="confirm_password" required
                                    placeholder="Enter Confirm Password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="register_btn" class="btn btn-primary" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
