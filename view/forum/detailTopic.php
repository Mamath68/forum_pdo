<?php

$topic = $result["data"]['topics'];
$posts = $result["data"]['posts'];

?>
<?php
if (App\Session::isAdmin()) {
  ?>
  <h1 style="margin-bottom:30px">
    <?= $topic->getTitle() ?>
  </h1>

  <div class="container" style="display:flex; flex-direction:column;align-items:center;/*justify-content:center;*/">
    <?php foreach ($posts as $post) { ?>
      <div class="card"
        style="background-image: url('https://i.pining.com/original/c9/6d/09/c96d09dd9e2ac87f10301cb40f94e8d3.jpg');width:30%;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text text-center text-light"><strong>
              <?= $post->getBody() ?>
            </strong></p>
          <p class="card-text text-center text-light"><strong>
              <?= $post->getUser()->getPseudo() ?>
            </strong></p>
        </div>
        <div class="button" style="display:flex; justify-content:center;">
          <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button"
              class="btn btn-primary btn-sm">Edit</button></a>
          <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button"
              class="btn btn-primary btn-sm">Delete</button></a>
        </div>
      </div>
    <?php }
    ?>

    <div>
      <form action="index.php?ctrl=forum&action=addPostByTopic&id=<?= $topic->getId() ?>" method="post">
        <textarea name="body" cols="30" rows="10" required></textarea>
        <button type="submit" name="submit">Ajouter votre Commentaire</button>
      </form>
    </div>

  </div>

  <?php
} else if (App\Session::getUser()) {
  ?>
    <h1 style="margin-bottom:30px">
    <?= $topic->getTitle() ?>
    </h1>

    <div class="container" style="display:flex; flex-direction:column;align-items:center;/*justify-content:center;*/">
    <?php foreach ($posts as $post) { ?>
        <div class="card"
          style="background-image: url('https://i.pining.com/original/c9/6d/09/c96d09dd9e2ac87f10301cb40f94e8d3.jpg');width:30%;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-center text-light"><strong>
              <?= $post->getBody() ?>
              </strong></p>
            <p class="card-text text-center text-light"><strong>
              <?= $post->getUser()->getPseudo() ?>
              </strong></p>
          </div>
          <div class="button" style="display:flex; justify-content:center;">
            <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button"
                class="btn btn-primary btn-sm">Edit</button></a>
            <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button"
                class="btn btn-primary btn-sm">Delete</button></a>
          </div>
        </div>
    <?php }
    ?>

      <div>
        <form action="index.php?ctrl=forum&action=addPostByTopic&id=<?= $topic->getId() ?>" method="post">
          <textarea name="body" cols="30" rows="10" required></textarea>
          <button type="submit" name="submit">Ajouter votre Commentaire</button>
        </form>
      </div>

    </div>
  <?php

} 
else { ?>
    <h1 style="margin-bottom:30px">
    <?= $topic->getTitle() ?>
    </h1>

  <div class="container" style="display:flex; flex-direction:column;align-items:center;/*justify-content:center;*/">
    <?php foreach ($posts as $post) { ?>
        <div class="card"
          style="background-image: url('https://i.pining.com/original/c9/6d/09/c96d09dd9e2ac87f10301cb40f94e8d3.jpg');width:30%;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-center text-light"><strong>
              <?= $post->getBody() ?>
              </strong></p>
            <p class="card-text text-center text-light"><strong>
              <?= $post->getUser()->getPseudo() ?>
              </strong></p>
          </div>
        </div>
    <?php }
    ?>
  </div>
<?
} ?>