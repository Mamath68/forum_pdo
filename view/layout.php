<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f0dc5fab26.js" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php
    if (App\Session::isAdmin()) {
        if ($title == App\Session::getUser()->getPseudo()) {
    ?>
            <header>
                <nav class="navbar navbar-expand-lg bg-secondary">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php?ctrl=home&action=detailUser"><span class="fas fa-user"></span>&nbsp;
                            <?= App\Session::getUser()->getPseudo() ?></a>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=home&action=home">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=forum&action=listcategories">Les Catégories</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        <?php        } else {
        ?>
            <header>
                <nav class="navbar navbar-expand-lg bg-secondary">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php?ctrl=home&action=detailUser"><span class="fas fa-user"></span>&nbsp;
                            <?= App\Session::getUser()->getPseudo() ?></a>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=home&action=home">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=forum&action=listcategories">Les Catégories</a>
                                </li>
                            </ul>
                            <div class="d-flex">
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        <?php
        }
        ?>
        <main>
            <?= $contenu ?>
        </main>
        <?php
    } else if (App\Session::getUser()) {
        if ($title == App\Session::getUser()->getPseudo()) {
        ?>
            <header>
                <nav class="navbar navbar-expand-lg bg-secondary">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php?ctrl=home&action=detailUser"><span class="fas fa-user"></span>&nbsp;
                            <?= App\Session::getUser()->getPseudo() ?></a>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=home&action=home">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=forum&action=listcategories">Les Catégories</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        <?php
        } else {
        ?>
            <header>
                <nav class="navbar navbar-expand-lg bg-secondary">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php?ctrl=home&action=detailUser"><span class="fas fa-user"></span>&nbsp;
                            <?= App\Session::getUser()->getPseudo() ?></a>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=home&action=home">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=forum&action=listcategories">Les Catégories</a>
                                </li>
                            </ul>
                            <div class="d-flex">
                                <li class="nav-item">
                                    <a class="nav-link link-light" href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        <?php
        }
        ?>
        <main>
            <?= $contenu ?>
        </main>
    <?php
    } else {
    ?>
        <header>
            <nav class="navbar navbar-expand-lg bg-secondary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="index.php?ctrl=home&action=home">Accueil</a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link link-light" href="index.php?ctrl=forum&action=listcategories">Liste des Catégories</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <?= $contenu ?>
        </main>
    <?php } ?>

    <footer class="text-white text-center text-lg-start bg-primary">
        <div class="text-center p-3 footer" style="background-color: rgba(0, 0, 0, 0.2);">
            <div>
                &copy; 2020 - Forum CDA
            </div>
            <div class="footer2">
                <a class="link" href="index.php?ctrl=home&action=forumRules" target="_blank">Règlement du forum</a>
                <a class="link" href="index.php?ctrl=home&action=forumMentions" target="_blank">Mentions légales</a>
            </div>
        </div>
    </footer>
</body>

</html>