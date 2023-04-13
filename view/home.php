<?php ob_start()
    ?>
<h1>BIENVENUE SUR LE FORUM</h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ut nemo quia voluptas numquam, itaque ipsa soluta
    ratione eum temporibus aliquid, facere rerum in laborum debitis labore aliquam ullam cumque.</p>

<p>
    <a href="/security/login.php">Se connecter</a>
    <span>&nbsp;-&nbsp;</span>
    <a href="/security/register.php">S'inscrire</a>
</p>

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
                <div class="card-body">
                    <form action="/security/register.php" method="POST">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="pseudo" required placeholder="Username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="addresse_mail" required placeholder="Email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="mot_passe" required placeholder="Password"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="mot_passe" required placeholder="Confirm Password"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="register_btn" class="btn btn-primary" value="Enregistrer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php

$contenu = ob_get_clean(); //temporisation de sortie
require("layout.php");