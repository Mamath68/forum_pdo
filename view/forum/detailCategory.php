<?php

$topics = $result["data"]['topics'];
$title = $result["data"]['title'];
?>

<?php
if (App\Session::isAdmin()) {

  ?>
  <h1 class='text-center' style='margin-bottom: 30px;'><?= $title->getTitle() ?> </h1>

  <div class="container" style="display:flex; flex-wrap: wrap;">
    <?php
    if (isset($topics)) {
      foreach ($topics as $topic) {
    ?>
        <?php
        // var_dump($topic->getCategory()->getId());
        ?>
        <div class="card" style="width:30%; margin:25px;">
          <div class="card-body">
            <h5 class="card-title text-center">
              <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getName() ?></a>
            </h5>
            <p class="card-text text-center"><?= $topic->getCreationdate() ?></p>
            <p class="card-text text-center"><?= $topic->getUser()->getPseudo() ?></p>
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
    <button>
      <a href="index.php?ctrl=forum&action=viewAddTop">Add</a>
    </button>
  </div>
<?php
} else if (App\Session::getUser()) {
?>

  <div class="container" style="display:flex; flex-wrap: wrap;">
    <?php
    if (isset($topics)) {
      foreach ($topics as $topic) {
    ?>
        <h1 class='text-center' style='margin-bottom: 30px;'><?= $topic->getCategory()->getTitle() ?> </h1>
        <?php
        // var_dump($topic->getCategory()->getId());
        ?>
        <div class="card" style="width:30%; margin:25px;">
          <div class="card-body">
            <h5 class="card-title text-center">
              <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getName() ?></a>
            </h5>
            <p class="card-text text-center"><?= $topic->getCreationdate() ?></p>
            <p class="card-text text-center"><?= $topic->getUser()->getPseudo() ?></p>
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
    <button>
      <a href="index.php?ctrl=forum&action=viewAddTop">Add</a>
    </button>
  </div>
<?php
} else {
?>

  <div class="container" style="display:flex; flex-wrap: wrap;">
    <?php
    if (isset($topics)) {
      foreach ($topics as $topic) {
    ?>
        <h1 class='text-center' style='margin-bottom: 30px;'><?= $topic->getCategory()->getTitle() ?> </h1>
        <?php
        // var_dump($topic->getCategory()->getId());
        ?>
        <div class="card" style="width:30%; margin:25px;">
          <div class="card-body">
            <h5 class="card-title text-center">
              <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getName() ?></a>
            </h5>
            <p class="card-text text-center"><?= $topic->getCreationdate() ?></p>
            <p class="card-text text-center"><?= $topic->getUser()->getPseudo() ?></p>
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
    <button>
      <a href="index.php?ctrl=forum&action=viewAddTop">Add</a>
    </button>
  </div>
<?php
}
$title = ucfirst($title->getTitle());
?>