<?php

$users = $result["data"]['users'];

?>

<h1>Liste des Utilisateur</h1>

<?php
echo '<table class="table">
    <thead>
      <tr>
      <th scope="col">Pseudo</th>
      <th scope="col">Date Inscription</th>
      <th scope="col">Role</th>
      </tr>
    </thead>';
    foreach ($users as $user) {
  echo '<tbody>
      <tr>
      <td>' .$user->getPseudo() . '</td>
      <td>' . $user->getDateInscription() . '</td>
     <td>' .//$user->getRoleUser() .
     '</td>
      </tr>';
}
echo ' </tbody>
      </table>';
