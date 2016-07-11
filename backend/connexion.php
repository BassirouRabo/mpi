<?php
session_start();
if (
    isset($_POST['email']) AND
    isset($_POST['password'])
) {

    strip_tags($_POST['email']);
    strip_tags($_POST['password']);

    try {
        $bdd = new PDO("pgsql:host=localhost;dbname=mpi", "postgres", "demo");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->prepare('SELECT * FROM client where email = :email AND password = :password ') or header('Location: ../connexion.php');

    $reponse->execute(array('email' => $_POST['email'], 'password' => $_POST['password']));
    $donnees = $reponse->fetch();

    if ($reponse->rowCount() == 1) {

        $_SESSION['admin'] = 'mpi';
        $_SESSION['client'] = $donnees['id'];
        $_SESSION['reference'] = rand(1, 999999999999999);
        $_SESSION['panier'] = 0;

        header('Location: ../');
    } else {
        header('Location: ../connexion.php');
    }

    $reponse->closeCursor();

} else {
    header('Location: ../connexion.php');
}
