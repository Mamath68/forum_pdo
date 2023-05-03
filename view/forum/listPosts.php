<?php

$posts = $result["data"]['posts'];
// $topics = $result["data"]['topics'];

?>

<h1>Liste des Messages</h1>

<?php

echo '<table class="table text-center">
    <thead>
      <tr>
      <th scope="col">Sujet</th>
      <th scope="col">Message</th>
      <th scope="col">Date/Heures de création</th>
      </tr>
    </thead>';
foreach ($posts as $post) {
  echo '<tbody>
      <tr>
      <td>' . $post->getTopic() . '</td>
      <td>' . $post->getBody() . '</td>
      <td>' . $post->getCreationDate() . '</td>
      </tr>';
}
echo ' </tbody>
      </table>';
?>
<?php

if (App\Session::getUser()) {

  include_once("addPost.php");

} else {
?>
<?php
}
?>

</div>