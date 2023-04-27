<?php

$categorys = $result["data"]['categorys'];

?>

<h1>Liste des Catégorie</h1>

<?php

echo '<table class="table text-center">
    <thead>
      <tr>
      <th scope="col">Titre de la Catégorie</th>
      </tr>
    </thead>';
    foreach ($categorys as $category) {
  echo '<tbody>
      <tr>
      <td>' .$category->getTitle() . '</td>
      </tr>';
}
echo ' </tbody>
      </table>';