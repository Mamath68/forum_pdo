<?php

$category = $result["data"]['category'];
$topics = $result["data"]['topics'];

?>
<?php
if (App\Session::isAdmin()) {

  echo "<h1 class='text-center' style='margin-bottom: 30px;'>" . $category->getTitle() .
    "</h1>";
  ?>
  <div class="container" style="display:flex; flex-wrap:wrap;">
    <?php
    if (!empty($topics)) {
      foreach ($topics as $topic) {
        echo '
        <div class="card" style="width:30%; margin:25px;">
          <div class="card-body">
            <h5 class="card-title text-center">
              <a href="index.php?ctrl=forum&action=findPostByTopic&id=' . $topic->getId() . '">' . $topic->getTitle() . '</a>
            </h5>
            <p class="card-text text-center">' . $topic->getCreationdate() . '</p>
            <p class="card-text text-center">' . $topic->getUser()->getPseudo() . '</p>
          </div>
        </div>';
      }
    } else {
      [];
    }
    ?>
    <div>
      <button>
        <a href="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>">Add</a>
      </button>
    </div>
  </div>
  <?php
} else if (App\Session::getUser()) {
  echo "<h1 class='text-center' style='margin-bottom: 30px;'>" . $category->getTitle() .
    "</h1>";
  ?>
    <div class="container" style="display:flex; flex-wrap:wrap;">
      <?php
      if (!empty($topics)) {
        foreach ($topics as $topic) {
          echo '
        <div class="card" style="width:30%; margin:25px;">
          <div class="card-body">
            <h5 class="card-title text-center">
              <a href="index.php?ctrl=forum&action=findPostByTopic&id=' . $topic->getId() . '">' . $topic->getTitle() . '</a>
            </h5>
            <p class="card-text text-center">' . $topic->getCreationdate() . '</p>
            <p class="card-text text-center">' . $topic->getUser()->getPseudo() . '</p>
          </div>
        </div>';
        }
      } else {
        echo '<p>PAS DE TOPIC POUR CETTE CATEGORIE</p>';
      }
      ?>
      <div>
        <button>
          <a href="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>">Add</a>
        </button>';
      </div>
    </div>
  <?php

} else {
  echo "<h1 class='text-center' style='margin-bottom: 30px;'>" . $category->getTitle() .
    "</h1>";
  ?>
    <div class="container" style="display:flex; flex-wrap:wrap;">
      <?php
      if (!empty($topics)) {
        foreach ($topics as $topic) {
          echo '
        <div class="card" style="width:30%; margin:25px;">
          <div class="card-body">
            <h5 class="card-title text-center">
              <a href="index.php?ctrl=forum&action=findPostByTopic&id=' . $topic->getId() . '">' . $topic->getTitle() . '</a>
            </h5>
            <p class="card-text text-center">' . $topic->getCreationdate() . '</p>
            <p class="card-text text-center">' . $topic->getUser()->getPseudo() . '</p>
          </div>
        </div>';
        }
      } else {
        echo '<p>PAS DE TOPIC POUR CETTE CATEGORIE</p>';
      }
      ?>
      <div>
        <button>
          <a href="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>">Add</a>
        </button>';
      </div>
    </div>
  <?php
}
?>