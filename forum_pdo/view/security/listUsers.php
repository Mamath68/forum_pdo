<?php

$users = $result["data"]['users'];
?>

<h1>Liste des Utilisateurs</h1>
<div class="container">

  <?php
  echo '<table class="table text-center">
  <thead>
  <tr>
<th scope="col">Pseudo</th>
<th scope="col">Date Inscription</th>
</tr>
</thead>';
  foreach ($users as $user) {
    echo '<tbody>
  <tr>
  <td>' . $user->getPseudo() . '</td>
  <td>' . $user->getRegisterDate() . '</td>
  </tr>';
  }
  echo ' </tbody>
</table>';
  ?>
</div>