<?php
$categories = $result["data"]["categories"];
?>

<h1>Catégorie liste</h1>

<?php

if (App\Session::isAdmin()) {

?>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <section>
          <?php
          if (isset($categories)) {
            foreach ($categories as $category) {
              
              ?>
              <div class="text-center padd">
                <a href="index.php?ctrl=forum&action=detailCategory&id=<?= $category->getId() ?>"><?= $category->getTitle() ?></a>
              </div>
            <?php
            }
          } else {
            ?>
            <h2>Pas de Publication ici!!</h2>
            <?php
          }

          ?>
        </section>
      </div>
    </div>
  </div>
<?php
  include_once("addCategory.php");
} else if (App\Session::getUser()) {
?>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <section>
          <?php
          if (isset($categories)) {
            foreach ($categories as $category) {
              ?>
              <div class="text-center padd">
                <a href="index.php?ctrl=forum&action=detailCategory&id=<?= $category->getId() ?>"><?= $category->getTitle() ?></a>
              </div>
            <?php
            }
          } else {
            ?>
            <h2>Pas de Publication ici!!</h2>
          <?php
          }
          ?>
        </section>
      </div>
    </div>
  </div>
<?php

} else {
?>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <section>
          <?php
          if (isset($categories)) {
            foreach ($categories as $category) {
              ?>
              <div class="text-center padd">
                <a href="index.php?ctrl=forum&action=detailCategory&id=<?= $category->getId() ?>"><?= $category->getTitle() ?></a>
              </div>
            <?php
            }
          } else {
            ?>
            <h2>Pas de Publication ici!!</h2>
          <?php
          }
          ?>
        </section>
      </div>
    </div>
  </div>
<?php
}
$title = "Les Catégories";
?>