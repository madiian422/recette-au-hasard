<?php

session_start();

if (!$_SESSION['mdp']) {
  header('location:../admin/admin.php');
}
require '../db.php';

$ID = $_GET['ID'];

$sql = 'SELECT * FROM recette WHERE ID=:ID';
$statement = $connection->prepare($sql);
$statement->execute([':ID' => $ID]);
$recette = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['nom_recette'])  && isset($_POST['ingredients']) && isset($_POST['description1'])) {

  $name = $_POST['nom_recette'];
  $ingredients = $_POST['ingredients'];
  $description = $_POST['description1'];



  $sql = 'UPDATE recette SET nom_recette=:nom_recette, ingredients=:ingredients,description1=:description1 WHERE ID=:ID';

  $statement = $connection->prepare($sql);

  if ($statement->execute([':nom_recette' => $name, ':ingredients' => $ingredients, ':description1' => $description, ':ID' => $ID])) {
    header("Location: index.php");
  }
}


?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modifier une recette</h2>
    </div>
    <div class="card-body">
      <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nom_recette">Intitulé de la recette</label>
          <input value="<?= $recette->nom_recette; ?>" type="text" name="nom_recette" id="nom_recette" class="form-control">
        </div>
        <div class="form-group">
          <label for="ingredients">Ingrédients</label>
          <input value="<?= $recette->ingredients; ?>" type="text" name="ingredients" id="ingredients" class="form-control">
        </div>
        <div class="form-group">
          <label for="description1">Description</label>
          <input value="<?= $recette->description1; ?>" type="text" name="description1" id="description1" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Modifier la recette</button>
        </div>
        <form>
          <input class="btn btn-info " type="button" value="Retour" onclick="history.go(-1)">
        </form>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>