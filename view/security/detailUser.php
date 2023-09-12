<?php
if (App\Session::isAdmin()) {
?>
    <div class="card text-center" style="width: 20em; margin-left: 40%;padding-top:2em;">
        <span class="fas fa-user"></span>
        <div class="card-body">
            <h5 class="card-title">
                <?= App\Session::getUser()->getPseudo() ?>
            </h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Addresse Email
                <?= App\Session::getUser()->getEmail() ?>
            </li>
            <li class="list-group-item">
                Date D'inscription <br>
                <?= App\Session::getUser()->getDateInscription() ?>
            </li>
        </ul>
        <div class="card-body">
            <a href="index.php?ctrl=forum&action=listTopics" class="card-link">Liens vers mes Sujets de Conversation</a>
            <a href="index.php?ctrl=security&action=logout" class="card-link">Déconnexion</a>
        </div>
    </div>

<?php
} else if (App\Session::getUser()) {
?>
    <div class="card text-center" style="width: 20em; margin-left: 40%;padding-top:2em;">
        <span class="fas fa-user"></span>
        <div class="card-body">
            <h5 class="card-title">
                <?= App\Session::getUser()->getPseudo() ?>
            </h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Addresse Email
                <?= App\Session::getUser()->getEmail() ?>
            </li>
            <li class="list-group-item">
                Date D'inscription <br>
                <?= App\Session::getUser()->getDateInscription() ?>
            </li>
        </ul>
        <div class="card-body">
            <a href="index.php?ctrl=forum&action=listTopics" class="card-link">Liens vers mes Sujets de Conversation</a>
            <a href="index.php?ctrl=security&action=logout" class="card-link">Déconnexion</a>
        </div>
    </div>
<?php
} else {
?>
    <div class="card text-center" style="width: 20em; margin-left: 40%;padding-top:2em;">
        <span class="fas fa-user"></span>
        <div class="card-body">
            <h5 class="card-title">
                <?= App\Session::getUser()->getPseudo() ?>
            </h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Addresse Email
                <?= App\Session::getUser()->getEmail() ?>
            </li>
            <li class="list-group-item">
                Date D'inscription <br>
                <?= App\Session::getUser()->getDateInscription() ?>
            </li>
        </ul>
        <div class="card-body">
            <a href="index.php?ctrl=forum&action=listTopics" class="card-link">Liens vers mes Sujets de Conversation</a>
            <a href="index.php?ctrl=security&action=logout" class="card-link">Déconnexion</a>
        </div>
    </div>
<?php }
$title = App\Session::getUser()->getPseudo();
?>