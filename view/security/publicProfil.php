<?php
$user = $result['data']['user'];
// var_dump($user);
?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">
                        <?= $user->getPseudo() ?>
                    </h5>
                    <span>Internaute</span>

                    <div class="px-4 mt-1">
                        <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat. </p>
                    </div>
                    <ul class="social-list">
                        <li>Addresse Email <br>
                            <?= $user->getEmail() ?>
                        </li>
                        <li>Date D'inscription <br>
                            <?= $user->getDateInscription() ?>
                        </li>
                    </ul>
                    <div class="buttons">
                        <button class="btn btn-success px-4 ms-3"><a class="card-link link-light" href="index.php?ctrl=forum&action=viewTopicByUser&id=<?= $user->getId() ?>">Les Topics</a></button>
                        <button class="btn btn-secondary px-4 ms-3"><a class="card-link link-light" href="index.php?ctrl=forum&action=viewPostByUser&id=<?= $user->getId() ?>">Les Postes</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$title = "Profil de" . " " . $user->getPseudo();

?>