<?php
/**
 * Created by IntelliJ IDEA.
 * User: brabo
 * Date: 7/11/16
 * Time: 9:59 PM
 */
session_start();
if (isset($_SESSION['reference']) and $_SESSION['reference'] != null AND $_SESSION['client'] and $_SESSION['client'] != null and $_GET['ref'] and $_GET['ref'] != null) {

    strip_tags($_GET['ref']);

    try {
        $bdd = new PDO("pgsql:host=localhost;dbname=mpi", "postgres", "demo");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $enregistrement = $bdd->prepare('DELETE FROM commande_tampon WHERE reference=:reference and produit_id = :produit_id');

    $enregistrement->execute(array(
        'reference' => $_SESSION['reference'],
        'produit_id' => $_GET['ref']
    ));

    header('Location: ../panier.php?ref=' . $_SESSION['reference']);


} else {

    header('Location: ../panier.php?ref=' . $_SESSION['reference']);
}