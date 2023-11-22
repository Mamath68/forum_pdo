<?php
if (App\Session::isAdmin()) {
?>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">
                            <?= App\Session::getUser()->getPseudo() ?>
                        </h5>
                        <span>Bonjour Administrateur</span>

                        <div class="px-4 mt-1">
                            <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                ut aliquip ex ea commodo consequat. </p>
                        </div>
                        <ul class="social-list">
                            <li>Addresse Email <br>
                                <?= App\Session::getUser()->getEmail() ?>
                            </li>
                            <li>Date D'inscription <br>
                                <?= App\Session::getUser()->getDateInscription() ?>
                            </li>
                        </ul>
                        <div class="buttons">
                            <button class="btn btn-success px-4 ms-3"><a href="index.php?ctrl=forum&action=viewTopicByUser&id=<?= App\Session::getUser()->getId() ?>" class="card-link link-light">Mes Topics</a></button>
                            <button class="btn btn-primary px-4 ms-3"><a class="link-light" href="index.php?ctrl=home&action=users">Les utilisateurs</a></button>
                            <button class="btn btn-secondary px-4 ms-3"><a href="index.php?ctrl=forum&action=viewPostByUser&id=<?= App\Session::getUser()->getId() ?>" class="card-link link-light">Mes Postes</a>
                            </button>
                            <button class="btn btn-secondary px-4 ms-3"><a href="index.php?ctrl=security&action=logout" class="card-link link-light">Déconnexion</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
} else if (App\Session::getUser()) {
?>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">
                            <?= App\Session::getUser()->getPseudo() ?>
                        </h5>
                        <span>Bonjour Internaute</span>

                        <div class="px-4 mt-1">
                            <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                ut aliquip ex ea commodo consequat. </p>
                        </div>
                        <ul class="social-list">
                            <li>Addresse Email <br>
                                <?= App\Session::getUser()->getEmail() ?>
                            </li>
                            <li>Date D'inscription <br>
                                <?= App\Session::getUser()->getDateInscription() ?>
                            </li>
                        </ul>
                        <div class="buttons">
                            <button class="btn btn-success px-4 ms-3"><a href="index.php?ctrl=forum&action=viewTopicByUser&id=<?= App\Session::getUser()->getId() ?>" class="card-link link-light">Mes Topics</a></button>
                            <button class="btn btn-warning px-4 ms-3"><a class="link-light" href="index.php?ctrl=security&action=deleteAccountForm&id=<?= App\Session::getUser()->getId() ?>">Supprimer
                                    mon Compte</a></button>
                            <button class="btn btn-secondary px-4 ms-3"><a class="link-light" href="index.php?ctrl=security&action=editUser&id=<?= App\Session::getUser()->getId() ?>">Modifier
                                    les information</a></button>
                            <button class="btn btn-secondary px-4 ms-3"><a href="index.php?ctrl=forum&action=viewPostByUser&id=<?= App\Session::getUser()->getId() ?>" class="card-link link-light">Mes Postes</a>
                            </button>
                            <button class="btn btn-secondary px-4 ms-3"><a href="index.php?ctrl=security&action=logout" class="card-link link-light">Déconnexion</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
$title = App\Session::getUser()->getPseudo();
?>