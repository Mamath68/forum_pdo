<?php

$users = $result["data"]['users'];

?>

<h1>Liste des Utilisateur</h1>

  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Pseudo</th>
        <th scope="col">Date Inscription</th>
      </tr>
    </thead>
    <?php
    foreach ($users as $user) {
    ?>
      <tbody>
        <tr>
          <td><a class="link-dark" href="index.php?ctrl=home&action=publicUser&id=<?= $user->getId() ?>">
              <?= $user->getPseudo() ?>
            </a></td>
          <td><?= $user->getDateInscription() ?></td>
        </tr>
      <?php
    }
      ?>
      </tbody>
  </table>

</div>

<?php
$title = "Liste des Utilisateurs";

?>