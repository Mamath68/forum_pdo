<?php
$categorys = $result["data"]["categorys"];
?>

<h1>Liste des Catégorie</h1>

<?php
echo '
<div class="container text-center">
  <div class="row">
    <div class="col">
      <section>';
foreach ($categorys as $category) {
  echo '<div class="text-center padd">
        <a href="index.php?ctrl=forum&action=detailCategory&id=' . $category->getId() . '">' . $category->getTitle() . '</div>';
}
echo '
    </section>
    </div>
  </div>
</div>';
?>

<?php

if (App\Session::isAdmin()) {
  include_once("addCategory.php");
} else {
?>
<?php
}
?>