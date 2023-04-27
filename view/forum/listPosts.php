<?php

$posts = $result["data"]['posts'];

?>

<h1>Liste des Messages</h1>

<?php

echo '<table class="table text-center">
    <thead>
      <tr>
      <th scope="col">Sujet</th>
      <th scope="col">Message</th>
      <th scope="col">Date et Heurs</th>
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