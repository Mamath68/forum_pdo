<?php
$categories = $result["data"]["categories"];
?>

<h1>Catégorie liste</h1>

<?php

if (App\Session::isAdmin()) {

?>
  <div class="container text-center">
    <div class="row">
      <?php
      if (isset($categories)) {
        foreach ($categories as $category) {
      ?>
          <div class="col">
            <div class="card" style="max-width: 20rem;">
              <div class="card-body">
                <a href="index.php?ctrl=forum&action=detailCategory&id=<?= $category->getId() ?>"><?= ucfirst($category->getTitle()) ?></a>
              </div>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <h2>Pas de Publication ici!!</h2>
      <?php
      }

      ?>
    </div>
  </div>
<?php
  include_once("addCategory.php");
} else if (App\Session::getUser()) {
?>
  <div class="container text-center">
    <div class="row">
      <?php
      if (isset($categories)) {
        foreach ($categories as $category) {
      ?>
          <div class="col">
            <div class="card" style="max-width: 20rem;">
              <div class="card-body">
                <a href="index.php?ctrl=forum&action=detailCategory&id=<?= $category->getId() ?>"><?= ucfirst($category->getTitle()) ?></a>
              </div>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <h2>Pas de Catégorie ici!!</h2>
      <?php
      }
      ?>
    </div>
  </div>
<?php

} else {
?>
  <div class="container text-center">
    <div class="row">
      <?php
      if (isset($categories)) {
        foreach ($categories as $category) {
      ?>
          <div class="col">
            <div class="card" style="max-width: 20rem;">
              <div class="card-body">
                <a href="index.php?ctrl=forum&action=detailCategory&id=<?= $category->getId() ?>"><?= ucfirst($category->getTitle()) ?></a>
              </div>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <h2>Pas de Catégorie ici!!</h2>
      <?php
      }
      ?>
    </div>
  </div>
<?php
}
$title = "Les Catégories";
?>