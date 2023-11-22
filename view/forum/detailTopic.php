<?php

$posts = $result["data"]['posts'];
$title = $result["data"]['title'];
// var_dump($title->getName())
?>
<?php
if (App\Session::isAdmin()) {
?>

  <h1 class='text-center' style='margin-bottom: 30px;'><?= $title->getName() ?> </h1>
  <div class="container text-center">
    <div class="row">
      <?php
      if (isset($posts)) {
        foreach ($posts as $post) {
          // var_dump($post->getId());
      ?>
          <div class="col">
            <div class="card" style="background-color: black; max-width: 20rem;">
              <div class="card-body">
                <div class="card-body">
                  <p class="card-text text-center text-light"><strong>
                      <?= $post->getBody() ?>
                    </strong></p>
                  <p class="card-text text-center text-light"><strong>
                      <?= $post->getCreationDate() ?>
                    </strong></p>
                  <p class="card-text text-center text-warning"><strong>
                      <?= $post->getUser()->getPseudo() ?>
                    </strong></p>
                </div>
                <div class="button" style="display:flex; justify-content:center;">
                  <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
                </div>
              </div>
            <?php }
        } else {
            ?>
            <h2>Pas de Poste</h2>
          <?php
        }
          ?>
            </div>
          </div>
          <button>
            <a href="index.php?ctrl=forum&action=viewAddTop">Add</a>
          </button>
        <?php
      } else if (App\Session::getUser()) {
        ?>
          <h1 class='text-center' style='margin-bottom: 30px;'><?= $title->getName() ?> </h1>
          <div class="container text-center">
            <div class="row">
              <?php
              if (isset($posts)) {
                foreach ($posts as $post) {
                  // var_dump($post->getId());
              ?>
                  <div class="col">
                    <div class="card" style="background-color: black; max-width: 20rem;">
                      <div class="card-body">
                        <div class="card-body">
                          <p class="card-text text-center text-light"><strong>
                              <?= $post->getBody() ?>
                            </strong></p>
                          <p class="card-text text-center text-light"><strong>
                              <?= $post->getCreationDate() ?>
                            </strong></p>
                          <p class="card-text text-center text-warning"><strong>
                              <?= $post->getUser()->getPseudo() ?>
                            </strong></p>
                        </div>
                        <div class="button" style="display:flex; justify-content:center;">
                          <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
                        </div>
                      </div>
                    <?php }
                } else {
                    ?>
                    <h2>Pas de Poste</h2>
                  <?php
                }
                  ?>
                    </div>
                  </div>
                  <button>
                    <a href="index.php?ctrl=forum&action=viewAddTop">Add</a>
                  </button>
                <?php

              } else { ?>
                  <h1 class='text-center' style='margin-bottom: 30px;'><?= $title->getName() ?> </h1>
                  <div class="container text-center">
                    <div class="row">
                      <?php
                      if (isset($posts)) {
                        foreach ($posts as $post) {
                          // var_dump($post->getId());
                      ?>
                          <div class="col">
                            <div class="card" style="background-color: black; max-width: 20rem;">
                              <div class="card-body">
                                <div class="card-body">
                                  <p class="card-text text-center text-light"><strong>
                                      <?= $post->getBody() ?>
                                    </strong></p>
                                  <p class="card-text text-center text-light"><strong>
                                      <?= $post->getCreationDate() ?>
                                    </strong></p>
                                  <p class="card-text text-center text-warning"><strong>
                                      <?= $post->getUser()->getPseudo() ?>
                                    </strong></p>
                                </div>
                                <div class="button" style="display:flex; justify-content:center;">
                                  <a href="index.php?ctrl=forum&action=addPostByTopic&id="><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
                                </div>
                              </div>
                            <?php }
                        } else {
                            ?>
                            <h2>Pas de Poste</h2>
                          <?php
                        }
                          ?>
                            </div>
                          </div>
                          <button>
                            <a href="index.php?ctrl=forum&action=viewAddTop">Add</a>
                          </button>
                        <?php
                      }

                      $title = $title->getName()
                        ?>