<?php
session_start();

// vérification si les champs sont vide ou pas 
if (isset($_POST['ok_connect'])) {
    if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
        $mdp = 'admin';
        $mail = 'ian@gmail.com';
        if ($_POST['mail'] == $mail) {
            if ($_POST['mdp'] == $mdp) {
                // declaration de la variable session qui authentifie l'admin
                $_SESSION['mdp'] = $mdp;
                header('location:../crud/index.php');
            } else {
                echo 'Mot de passe incorrect';
            }
        } else {
            echo 'Adresse email incorrect';
        }
    } else {
        echo "Veuillez completer les camps";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Connexion admin</title>


</head>

<body>

    <div class="container login-form">


        <form method="post">
            <h2 class="text-center">Connexion Admin</h2>
            <div class="form-group">
                <input type="email" name="mail" class="form-control" placeholder="mail" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="mdp" class="form-control" placeholder="mdp" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="ok_connect">Connexion</button>
            </div>
        </form>


    </div>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</body>

</html>