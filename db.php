<?php
$dsn = 'mysql:host=localhost;dbname=random_recette';
$username = 'root';
$password = '';

try {
    $connection = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
}
