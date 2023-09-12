<?php

$users = $result["data"]['users'];

?>

<h1>Liste des Utilisateur</h1>
<div style="padding-bottom:21.5%;">

  <?php
  ?>
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
          <td><?= $user->getPseudo() ?></td>
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