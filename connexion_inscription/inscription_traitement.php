<?php
session_start();
?>

<?php
require_once '../db.php';
echo 'ffffffffffffffffffffffff';

if (isset($_POST['pseudo']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])) {

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $tel = htmlspecialchars($_POST['tel']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    echo 'ffffffffffffffffffffffff';

    $check = $connection->prepare('SELECT pseudo,prenom,tel,adresse, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    // gestion des erreurs et insertion des nouveaux utilisateurs
    if ($row == 0) {
        if (strlen($pseudo) <= 100) {
            if (strlen($email) <= 100) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($password == $password_retype) {
                        // table de hashage sha256 pour crypter le mot de passe 
                        $password = hash('sha256', $password);
                        $ip = $_SERVER['REMOTE_ADDR'];

                        $insert = $connection->prepare('INSERT INTO utilisateurs(pseudo,prenom,tel,adresse, email, password, ip) VALUES(:pseudo, :prenom,:tel, :adresse, :email, :password, :ip)');
                        $insert->execute(array(
                            'pseudo' => $pseudo,
                            'prenom' => $prenom,
                            'tel' => $tel,
                            'adresse' => $adresse,
                            'email' => $email,
                            'password' => $password,
                            'ip' => $ip
                        ));

                        header('Location:inscription.php?reg_err=success');
                    } else header('Location: inscription.php?reg_err=password');
                } else header('Location: inscription.php?reg_err=email');
            } else header('Location: inscription.php?reg_err=email_length');
        } else header('Location: inscription.php?reg_err=pseudo_length');
    } else header('Location: inscription.php?reg_err=already');
}
