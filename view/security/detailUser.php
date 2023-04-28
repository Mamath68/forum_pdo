<?php

$users = $result["data"]['users'];

?>

<h1>Liste des Utilisateur</h1>

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
      <td>' .$user->getPseudo() . '</td>
      <td>' . $user->getDateInscription() . '</td>
      </tr>';
}
echo ' </tbody>
      </table>';
