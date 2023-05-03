<?php

$topics = $result["data"]['topics'];

?>

<h1>Liste des Sujets</h1>
<?php
echo '<table class="table text-center">
    <thead>
      <tr>
      <th scope="col">Sujet</th>
      <th scope="col">Date/Heures de création</th>
      </tr>
    </thead>';
foreach ($topics as $topic) {
  echo '<tbody>
      <tr>
      <td><a href=""></a>' . $topic->getTitle() . '</td>
      <td>' . $topic->getCreationdate() . '</td>
      </tr>';
}
echo ' </tbody>
      </table>';
?>
<?php

if (App\Session::getUser()) {
  include_once("addTopics.php");

} else {

}
?>

</div>