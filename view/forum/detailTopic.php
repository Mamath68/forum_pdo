<?php

$posts = $result["data"]['posts'];

?>

<h1>Liste des Messages</h1>

<?php

echo '<table class="table text-center">
<thead>
  <tr>
    <th scope="col">Message</th>
    <th scope="col">Date/Heures de création</th>
  </tr>
</thead>
<tbody>';

foreach ($posts as $post) {
  echo '
  <tr>
  <td>' . $post->getBody() . '</td>
  <td>' . $post->getCreationDate() . '</td>
  </tr>';
}
echo  '</tbody>
       </table>';
?>
<?php

if (App\Session::getUser()) {
  include_once("addPost.php");
} else {

}
?>
</div>