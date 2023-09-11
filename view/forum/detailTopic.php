<?php

$posts = $result["data"]['posts'];
$title = $result["data"]['title'];
// var_dump($title->getName())
?>
<?php
if (App\Session::isAdmin()) {
?>

  <div class="container" style="display:flex; flex-direction:column;align-items:center;/*justify-content:center;*/">

    <h1 style="margin-bottom:30px"> <?= $title->getName() ?> </h1>
    <?php
    if (isset($posts)) {
      foreach ($posts as $post) {
        // var_dump($post->getId());
    ?>
        <div class="card" style="background-color: black;width:30%;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-center text-light"><strong>
                <?= $post->getBody() ?>
              </strong></p>
            <p class="card-text text-center text-light"><strong>
                <?= $post->getCreationDate() ?>
              </strong></p>
            <p class="card-text text-center text-warning"><strong>
                <?= $post->getUser()->getPseudo() ?>
              </strong></p>
          </div>
          <div class="button" style="display:flex; justify-content:center;">
            <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
            <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
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

<?php
} else if (App\Session::getUser()) {
?>
  <div class="container" style="display:flex; flex-direction:column;align-items:center;/*justify-content:center;*/">

    <h1 style="margin-bottom:30px"> <?= $title->getName() ?> </h1>
    <?php
    if (isset($posts)) {
      foreach ($posts as $post) {
        // var_dump($post->getId());
    ?>
        <div class="card" style="background-color: black;width:30%;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-center text-light"><strong>
                <?= $post->getBody() ?>
              </strong></p>
            <p class="card-text text-center text-light"><strong>
                <?= $post->getCreationDate() ?>
              </strong></p>
            <p class="card-text text-center text-warning"><strong>
                <?= $post->getUser()->getPseudo() ?>
              </strong></p>
          </div>
          <div class="button" style="display:flex; justify-content:center;">
            <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
            <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
          </div>
        </div>
      <?php }
    } else {
      ?>
      <h2>Pas de Poste</h2>
    <?php
    }

    ?>

    <div>
      <form action="index.php?ctrl=forum&action=addPostByTopic&id=<?= $topic->getId() ?>" method="post">
        <textarea name="body" cols="30" rows="10" required></textarea>
        <button type="submit" name="submit">Ajouter votre Commentaire</button>
      </form>
    </div>

  </div>
<?php

} else { ?>
  <div class="container" style="display:flex; flex-direction:column;align-items:center;/*justify-content:center;*/">

<h1 style="margin-bottom:30px"> <?= $title->getName() ?> </h1>
<?php
  if (isset($posts)) {
    foreach ($posts as $post) { 
      // var_dump($post->getId());
      ?>
      <div class="card" style="background-color: black;width:30%;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text text-center text-light"><strong>
              <?= $post->getBody() ?>
            </strong></p>
          <p class="card-text text-center text-light"><strong>
              <?= $post->getCreationDate() ?>
            </strong></p>
          <p class="card-text text-center text-warning"><strong>
              <?= $post->getUser()->getPseudo() ?>
            </strong></p>
        </div>
        <div class="button" style="display:flex; justify-content:center;">
          <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
          <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
        </div>
      </div>
    <?php }
  } else {
    ?>
    <h2>Pas de Poste</h2>
  <?php
  }

  ?>
<?php

}
$title = $title->getName();
?>