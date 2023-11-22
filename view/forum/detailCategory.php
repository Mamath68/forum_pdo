<?php

$topics = $result["data"]['topics'];
$title = $result["data"]['title'];
$category = $result["data"]["category"];
?>

<?php
if (App\Session::isAdmin()) {

?>
  <h1 class='text-center' style='margin-bottom: 30px;'><?= $title->getTitle() ?> </h1>
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
                  <p class="card-text text-center"><?= $topic->getUser()->getPseudo() ?></p>
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
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="post">
            <div class="mb-3">
              <label for="title" class="form-label">Titre du sujet</label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Entrez Votre titre">
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" value="Envoyer" class="btn btn-primary" name="submit">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php
} else if (App\Session::getUser()) {
?>

  <h1 class='text-center' style='margin-bottom: 30px;'><?= $title->getTitle() ?> </h1>
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
                <h5 class="card-title text-center">
                  <a href="index.php?ctrl=forum&action=detailTopic&id=<?= $topic->getId() ?>"><?= $topic->getName() ?></a>
                </h5>
                <p class="card-text text-center"><?= $topic->getCreationdate() ?></p>
                <p class="card-text text-center"><?= $topic->getUser()->getPseudo() ?></p>
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
  <button>
    <a href="index.php?ctrl=forum&action=viewAddTop">Add</a>
  </button>
<?php
} else {
?>

  <h1 class='text-center' style='margin-bottom: 30px;'><?= $title->getTitle() ?> </h1>
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
                  <p class="card-text text-center"><?= $topic->getUser()->getPseudo() ?></p>
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
}
$title = ucfirst($title->getTitle());
?>