<?php

$category = $result["data"]['category'];
$topics = $result["data"]['topics'];
var_dump($category);
var_dump($topics);
?>

<?php

echo "<h1 class='text-center' style='margin-bottom: 30px;'>" . $category->getTitle() .
  "</h1>";

?>

<div class="container" style="display:flex; flex-wrap:wrap;">
  <?php
    foreach ($topics as $topic) 
    {?>
      <div class="card" style="width:30%; margin:25px;">
        <div class="card-body">
          <h5 class="card-title text-center">
            <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId()->getTitle() ?>"></a>
          </h5>
        <p class="card-text text-center">
          <?= $topic->getCreationdate() ?>
        </p>
        <p class="card-text text-center">
          <?= $topic->getUser()->getPseudo() ?>
        </p>
      </div>
  <?php 
    } ?>
  <button>
    <a href="index.php?ctrl=forum&action=viewAddTop&id=<?= $category->getId() ?>">Add</a>
  </button>
</div>