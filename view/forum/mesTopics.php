<?php
$topics = $result["data"]['topics'];
$user = $result["data"]['user'];

?>

<h1>Les Topics de <?= $user->getPseudo() ?></h1>
<div class="container text-center">
    <div class="row">
        <?php
        if (isset($topics)) {
            foreach ($topics as $topic) {
                // var_dump($topic->getCategory()->getId());
        ?>
                <div class="col">
                    <div class="card" style="max-width: 20rem;">
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getName() ?></a>
                                </h5>
                                <p class="card-text text-center"><?= $topic->getCreationdate() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <h2>Pas de Topic</h2>
        <?php
        }
        ?>
    </div>
</div>


<?php
$title = "Les Topics de" . " " . $user->getPseudo();
?>