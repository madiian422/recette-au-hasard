<?php
require '../db.php';



$ID = $_GET['ID'];
$sql = 'DELETE FROM recette WHERE ID=:ID';
$statement = $connection->prepare($sql);
if ($statement->execute([':ID' => $ID])) {
  header("Location: index.php");
}
