<?php

$topic = $result["data"]['topic'];
$posts = $result["data"]['posts'];

?>
<?php
if (App\Session::isAdmin()) {

  echo "<h1 class='text-center' style='margin-bottom: 30px;'>" . $topic->getTitle() .
    "</h1>";
  ?>
  <div class="container" style="display:flex; flex-direction:column; align-items:center;">
    <?php
    if (!empty($posts)) {
      foreach ($posts as $post) {
        echo '<div class="card" style="background-color:black; width: 30%;margin:25px;">
        <div class="card-body">
            <p class="card-text text-center" style="color:yellow"><small>' . $post->getUser()->getPseudo() . '
              </small></p>
              <p class="card-text text-center text-light"><strong>' . $post->getBody() . '
              </strong></p>
        </div>
        <div class="button" style="display:flex; justify-content:center;">
        
          <a style="color:white" href="index.php?ctrl=forum&action=editPostByTopic&id=' . $post->getId() . '"><button class="btn btn-success">Edit</button></a>
          <a style="color:white" href="index.php?ctrl=forum&action=deletPostByTopic&id=' . $post->getId() . '"><button class="btn btn-danger">Delete</button></a>
        </div>
      </div>';
      }
    } else {
      echo "pas de post";
    }
    ?>
    <div>
      <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="post">
        <textarea name="body" cols="30" rows="10" required></textarea>
        <button type="submit" name="submit">Ajouter votre Commentaire</button>
      </form>
    </div>
    <?php
} else if (App\Session::getUser()) {
  
       echo "<h1 class='text-center' style='margin-bottom: 30px;'>" . $topic->getTitle() .
    "</h1>";
  ?>
  <div class="container" style="display:flex; flex-direction:column; align-items:center;">
    <?php
    if (!empty($posts)) {
      foreach ($posts as $post) {
        echo '<div class="card" style="background-color:black; width: 30%;margin:25px;">
        <div class="card-body">
            <p class="card-text text-center" style="color:yellow"><small>' . $post->getUser()->getPseudo() . '
              </small></p>
              <p class="card-text text-center text-light"><strong>' . $post->getBody() . '
              </strong></p>
        </div>
        <div class="button" style="display:flex; justify-content:center;">
        
          <a style="color:white" href="index.php?ctrl=forum&action=editPostByTopic&id=' . $post->getId() . '"><button class="btn btn-success">Edit</button></a>
          <a style="color:white" href="index.php?ctrl=forum&action=deletPostByTopic&id=' . $post->getId() . '"><button class="btn btn-danger">Delete</button></a>
        </div>
      </div>';
      }
    } else {
      echo "pas de post";
    }
    ?>
    <div>
      <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="post">
        <textarea name="body" cols="30" rows="10" required></textarea>
        <button type="submit" name="submit">Ajouter votre Commentaire</button>
      </form>
    </div>
    <?php

} else {
  echo "<h1 class='text-center' style='margin-bottom: 30px;'>" . $topic->getTitle() .
  "</h1>";
?>
<div class="container" style="display:flex; flex-direction:column; align-items:center;">
  <?php
  if (!empty($posts)) {
    foreach ($posts as $post) {
      echo '<div class="card" style="background-color:black; width: 30%;margin:25px;">
      <div class="card-body">
          <p class="card-text text-center" style="color:yellow"><small>' . $post->getUser()->getPseudo() . '
            </small></p>
            <p class="card-text text-center text-light"><strong>' . $post->getBody() . '
            </strong></p>
      </div>
      <div class="button" style="display:flex; justify-content:center;">
      
        <a style="color:white" href="index.php?ctrl=forum&action=editPostByTopic&id=' . $post->getId() . '"><button class="btn btn-success">Edit</button></a>
        <a style="color:white" href="index.php?ctrl=forum&action=deletPostByTopic&id=' . $post->getId() . '"><button class="btn btn-danger">Delete</button></a>
      </div>
    </div>';
    }
  } else {
    echo "pas de post";
  }

} ?>