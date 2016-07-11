<?php
/**
 * Created by IntelliJ IDEA.
 * User: brabo
 * Date: 7/11/16
 * Time: 10:46 PM
 */
session_start();
if (isset($_SESSION['reference']) and $_SESSION['reference'] != null AND $_SESSION['client'] and $_SESSION['client'] != null) {

    try {
        $bdd = new PDO("pgsql:host=localhost;dbname=mpi", "postgres", "demo");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    $reponse = $bdd->prepare('UPDATE commande_tampon SET status = :status WHERE reference = :reference and client_id = :client_id ');
    $reponse->execute(array(
        'status' => 1,
        'reference' => $_SESSION['reference'],
        'client_id' => $_SESSION['client']
    ));

    $_SESSION['reference'] = rand(1, 999999999999999);
    header('Location: ../validation.php');

} else {
    header('Location: ../boutique.php');
}

