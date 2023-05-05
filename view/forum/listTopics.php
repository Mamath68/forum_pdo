<?php

$topics = $result["data"]['topics'];

?>

<h1 class="text-light" style="margin-bottom:30px">Liste des Sujets</h1>

<div class="container" style="display:flex; flex-wrap: wrap;">
  <?php foreach ($topics as $topic) { ?>
    <div class="card"
      style="background-image: url('https://i.pining.com/original/c9/6d/09/c96d09dd9e2ac87f10301cb40f94e8d3.jpg');width:30%;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-title text-center">
          <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a>
        </p>
        <p class="card-text text-center">
          <?= $topic->getCreationdate() ?>
        </p>
        <p class="card-text text-center">
          <?= $topic->getUser()->getPseudo() ?><br>
        </p>
      </div>
    </div>
  <?php } ?>
</div>