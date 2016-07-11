<?php
if (
    isset($_POST['nom']) AND
    isset($_POST['prenom']) AND
    isset($_POST['email']) AND
    isset($_POST['password']) AND
    isset($_POST['password_confirm']) AND
    $_POST['password'] == $_POST['password_confirm']
) {

    strip_tags($_POST['nom']);
    strip_tags($_POST['prenom']);
    strip_tags($_POST['email']);
    strip_tags($_POST['password']);

    try {
        $bdd = new PDO("pgsql:host=localhost;dbname=mpi", "postgres", "demo");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $enregistrement = $bdd->prepare('INSERT INTO client (nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)');

    $enregistrement->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    )) or header('Location: ../connexion.html');

    $enregistrement->closeCursor();

    header('Location: ../');

} else {
    header('Location: ../connexion.html');
}
