<?php
$categories = $result["data"]["categories"];
?>

<h1>Liste des Catégorie</h1>

<?php

if (App\Session::isAdmin()) {

  echo '
<div class="container text-center">
  <div class="row">
    <div class="col">
      <section>';
  foreach ($categories as $category) {
    echo '<div class="text-center padd">
        <a href="index.php?ctrl=forum&action=findTopicByCat&id=' . $category->getId() . '">' . $category->getTitle() . '</a></div>';
  }
  echo '
    </section>
    </div>
  </div>
</div>';

  include_once("addCategory.php");

} else if (App\Session::getUser()) {
  echo '
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <section>';
  foreach ($categories as $category) {
    echo '<div class="text-center padd">
          <a href="index.php?ctrl=forum&action=findTopicByCat&id=' . $category->getId() . '">' . $category->getTitle() . '</a></div>';
  }
  echo '
      </section>
      </div>
    </div>
  </div>';

} else {
  echo '
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <section>';
  foreach ($categories as $category) {
    echo '<div class="text-center padd">
          <a href="index.php?ctrl=forum&action=findTopicByCat&id=' . $category->getId() . '">' . $category->getTitle() . '</a></div>';
  }
  echo '
      </section>
      </div>
    </div>
  </div>';
}