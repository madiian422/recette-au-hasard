<?php
require_once '../db.php';
session_start();


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $check = $connection->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    // gestion des erreurs
    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = hash('sha256', $password);
            if ($data['password'] === $password) {
                $_SESSION['user'] = $data['email'];
                header('Location: landing.php');
                die();
            } else header('Location: index.php?login_err=password');
        } else header('Location: index.php?login_err=email');
    } else header('Location: index.php?login_err=already');
}
