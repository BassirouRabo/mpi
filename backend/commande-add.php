<?php
/**
 * Created by IntelliJ IDEA.
 * User: brabo
 * Date: 7/11/16
 * Time: 8:49 PM
 */
session_start();
if (isset($_SESSION['reference']) and $_SESSION['reference'] != null AND $_SESSION['client'] and $_SESSION['client'] != null and $_POST['ref'] and $_POST['ref'] != null) {

    strip_tags($_POST['ref']);

    try {
        $bdd = new PDO("pgsql:host=localhost;dbname=mpi", "postgres", "demo");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->prepare('SELECT * FROM produit WHERE id = :id');
    $reponse->execute(array('id' => $_POST['ref'])) or die(print_r($bdd->errorInfo()));
    $donnees = $reponse->fetch();


    if ($reponse->rowCount() == 1) {


        $enregistrement = $bdd->prepare('INSERT INTO commande_tampon (reference, client_id, produit_id,  status) VALUES(:reference, :client_id, :produit_id, :status)');

        $enregistrement->execute(array(
            'reference' => $_SESSION['reference'],
            'client_id' => $_SESSION['client'],
            'produit_id' => $donnees['id'],
            'status' => 0
        )) or header('Location: ../produit.php?ref=' . $_POST['ref']);


        header('Location: ../panier.php?ref=' . $_SESSION['reference']);

    } else {
        header('Location: ../produit.php?ref=' . $_POST['ref']);
    }


} else {
    header('Location: deconnexion.php');
}