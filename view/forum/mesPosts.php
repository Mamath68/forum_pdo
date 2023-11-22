<?php
$posts = $result["data"]['posts'];
$user = $result["data"]['user'];


?>

<h1>Les Publications de <?= $user->getPseudo() ?></h1>

<div class="container text-center">
    <div class="row">
        <?php
        if (isset($posts)) {
            foreach ($posts as $post) {
                // var_dump($post->getId());
        ?>
                <div class="col">
                    <div class="card" style="background-color: black; max-width: 20rem;">
                        <div class="card-body">
                            <div class="card-body">
                                <p class="card-text text-center text-light"><strong>
                                        <?= $post->getBody() ?>
                                    </strong></p>
                                <p class="card-text text-center text-light"><strong>
                                        <?= $post->getCreationDate() ?>
                                    </strong></p>
                            </div>
                            <div class="button" style="display:flex; justify-content:center;">
                                <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            ?>
            <h2>Pas de Poste</h2>
        <?php
        }
        ?>
    </div>
</div>

<?php
$title = "Les Publications de" . " " . $user->getPseudo();
?>