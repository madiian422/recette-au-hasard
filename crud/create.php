<?php

session_start();
require '../db.php';
if (!$_SESSION['mdp']) {
  header('location:../admin/admin.php');
}




$message = '';
if (isset($_POST['nom_recette']) && isset($_POST['ingredients']) && isset($_POST['description1'])) {

  $name = $_POST['nom_recette'];
  $ingredients = $_POST['ingredients'];
  $description = $_POST['description1'];

  $sql = 'INSERT INTO recette(nom_recette, ingredients,description1) VALUES(:name, :ingredients, :description1)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':ingredients' => $ingredients, ':description1' => $description])) {
    $message = 'Recette ajoutée !';
  }
}


?>
<?php require '../header.php'; ?>
<div class="container">
  <button><a href="../admin/deconnect.php">Déconnexion</a></button>
  <div class="card mt-5">
    <div class="card-header">
      <h2>Ajouter une recette</h2>
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
          <input type="text" name="nom_recette" id="nom_recette" class="form-control">
        </div>
        <div class="form-group">
          <label for="ingredients">Ingrédients</label>
          <input type="text" name="ingredients" id="ingredients" class="form-control">
        </div>
        <div class="form-group">
          <label for="description1">Description</label>
          <input type="text" name="description1" id="description1" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ajouter la recette</button>
        </div>
        <form>
          <input class="btn btn-info " type="button" value="Retour" onclick="history.go(-1)">
        </form>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>