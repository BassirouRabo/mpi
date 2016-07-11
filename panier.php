<?php
session_start();
try {
    $bdd = new PDO("pgsql:host=localhost;dbname=mpi", "postgres", "demo");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$donnees = null;
$reponse = null;

if (isset($_GET['ref']) AND $_GET['ref'] != null) {
    strip_tags($_POST['ref']);
    $reponse = $bdd->prepare('SELECT * FROM commande_tampon WHERE reference = :reference');
    $reponse->execute(array('reference' => $_GET['ref'])) or die(print_r($bdd->errorInfo()));
    $donnees = $reponse->fetch();
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-js">

<head>
    <meta charset="UTF-8"/>

    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="APKode.net"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Panier </title>


    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"/>
    <link rel="stylesheet" type="text/css" href="css/fonts/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="css/flexslider.css"/>

    <link rel="stylesheet" type="text/css" href="css/color-schemes/core.css"/>
    <link rel="stylesheet" type="text/css" href="css/color-schemes/turquoise.css" id="color_scheme"/>


    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Shadows+Into+Light"
          rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>


    <script type="text/javascript" src="js/jquery-ui-1.10.2.custom.js"></script>
    <script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="js/jquery.sharrre-1.3.4.js"></script>
    <script type="text/javascript" src="js/jquery.gmap3.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/imagesloaded.js"></script>
    <script type="text/javascript" src="js/la_boutique.js"></script>

    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<div class="wrapper">

    <div class="header">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="span6">

                    </div>
                    <div class="span6 hidden-phone">
                        <ul class="inline pull-right">
                            <li>
                                <?php
                                if (isset($_SESSION['admin']) and $_SESSION['admin'] = 'mpi') {
                                    echo '<a href="backend/deconnexion.php" title="Deconnexion">Deconnexion</a>';
                                } else {
                                    echo '<a href="backend/connexion.php" title="Connexion">Connexion / Inscription</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <div class="logo">
                            <a href="/" title="&larr; Accueil">
                                <img src="img/logo.png" alt="Mell Plus Informatique"/>
                            </a>
                        </div>
                    </div>

                    <div class="span4">
                        <div class="row-fluid">
                            <div class="span10">

                                <div class="search">
                                    <div class="qs_s">

                                        <form method="post" action="search.html"/>
                                        <input type="text" name="query" id="query" placeholder="Recherche&hellip;"
                                               autocomplete="off" value=""/>
                                        </form>


                                    </div>
                                </div>

                            </div>

                            <div class="span2">

                                <div class="mini-cart">
                                    <a href="panier.php" title="Go to cart &rarr;">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

    <nav class="navigation">
        <div class="container">
            <div class="row">
                <div class="span9">
                    <div class="hidden-phone">
                        <ul class="main-menu">
                            <li>
                                <a href="/" title="Accueil" class="title">Accueil</a>
                            </li>
                            <li>
                                <a href="groupe.php" title="La société" class="title">Groupe mellplus</a>
                            </li>
                            <li>
                                <a href="prestations.php" title="Prestations" class="title">Prestations</a>
                            </li>
                            <li>
                                <a href="departements.php" title="Département" class="title">Département</a>
                            </li>
                            <li>
                                <a href="boutique.php" title="Boutique" class="title">Boutique</a>
                            </li>
                            <li>
                                <a href="contact.php" title="Contact" class="title">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="visible-phone">
                        <select class="mobile-nav">
                            <option value="" selected="selected"/>
                            Go to&hellip;
                            <option value="/"/>
                            Accueil
                            <option value="groupe.php"/>
                            Groupe mellplus
                            <option value="prestations.php"/>
                            Prestations
                            <option value="departement.php"/>
                            Département
                            <option value="boutique.php"/>
                            Boutique
                            <option value="contact.php"/>
                            Contact
                        </select>
                    </div>
                </div>

                <div class="span3 visible-desktop">
                </div>
            </div>
        </div>
    </nav>


    <section class="main">

        <section class="cart">

            <div class="container">
                <div class="row">

                    <div class="span9">

                        <div class="box">
                            <form action="backend/validation.php" method="post">

                            <div class="box-header">
                                <h3>Panier</h3>
                            </div>

                                <?php
                                if ($donnees != null) {
                                    ?>
                                    <div class="box-content">
                                        <div class="cart-items">

                                            <table class="styled-table">
                                                <thead>
                                                <tr>
                                                    <th class="col_product text-left">Produit</th>
                                                    <th class="col_remove text-right">Supprimer</th>
                                                    <th class="col_single text-right">Prix</th>
                                                    <th class="col_discount text-right">TVA</th>
                                                    <th class="col_total text-right">Total</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                while ($donnees = $reponse->fetch()) {

                                                    $reponseP = $bdd->prepare('SELECT * FROM produit WHERE id = :id');
                                                    $reponseP->execute(array('id' => $donnees['produit_id'])) or die(print_r($bdd->errorInfo()));
                                                    $donneesP = $reponseP->fetch();

                                                    if ($reponseP->rowCount() == 1) {
                                                        ?>
                                                        <tr>
                                                            <td class="col_product text-left">

                                                                <h5>
                                                                    <a href="produit.php"><?php echo $donneesP['nom']; ?></a>
                                                                </h5>

                                                            </td>

                                                            <td class="col_remove text-right">
                                                                <a href="backend/commande-delete.php?ref=<?php echo $donneesP['id']; ?>">
                                                                    <i class="icon-trash icon-large"></i>
                                                                </a>
                                                            </td>

                                                            <td class="col_single text-right">
                                                                <span
                                                                    class="single-price"><?php echo $donneesP['prix']; ?></span>
                                                            </td>

                                                            <td class="col_discount text-right">
                                                                <span
                                                                    class="discount"><?php echo $donneesP['tva']; ?></span>
                                                            </td>

                                                            <td class="col_total text-right">
                                                                <span
                                                                    class="total-price"><?php echo $donneesP['prix']; ?></span>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a href="boutique.php" class="btn btn-small">
                                                <i class="icon-chevron-left"></i> &nbsp; Continuer l'achat
                                            </a>
                                        </div>

                                        <div class="pull-right">

                                            <button type="submit" name="checkout" value="1"
                                                    class="btn btn-primary btn-small mm20">Valider la commande &nbsp; <i
                                                    class="icon-chevron-right"></i>
                                            </button>
                                        </div>
                                </div>
                                    <?php
                                }
                                ?>


                            </form>
                        </div>


                    </div>


                </div>
            </div>
        </section>
        <!-- End Cart container -->

    </section>

    <div class="footer">
        <div class="container">
            <div class="row">

                <div class="span2">
                    <div class="support">
                        <h6>Menu</h6>

                        <ul class="links">
                            <li>
                                <a href="groupe.php" title="Groupe Mell Plus" class="title">Groupe Mell Plus</a>
                            </li>
                            <li>
                                <a href="prestations.php" title="prestation" class="title">Prestations</a>
                            </li>
                            <li>
                                <a href="departements.php" title="Départements" class="title">Departements</a>
                            </li>
                            <li>
                                <a href="boutiques.html" title="Boutique" class="title">Boutique</a>
                            </li>
                            <li>
                                <a href="contact.php" title="Contact" class="title">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <hr/>

                </div>

                <div class="span2">

                    <div class="categories">
                        <h6>Produits</h6>

                        <ul class="links">
                            <li>
                                <a href="boutique.php" title="Laptop">Laptop</a>
                            </li>
                            <li>
                                <a href="boutique.php" title="Apple">Apple</a>
                            </li>
                            <li>
                                <a href="boutique.php" title="Réseau">Réseau</a>
                            </li>
                            <li>
                                <a href="boutique.php" title="Téléphonie">Téléphonie</a>
                            </li>
                            <li>
                                <a href="boutique.php" title="Sécurité">Sécurité</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="span4">
                    <div class="account">
                        <h6>Mon compte</h6>

                        <ul class="links">
                            <li>
                                <?php
                                if (isset($_SESSION['admin']) and $_SESSION['admin'] = 'mpi') {
                                    echo '<a href="backend/deconnexion.php" title="Deconnexion">Deconnexion</a>';
                                } else {
                                    echo '<a href="backend/connexion.php" title="Connexion">Connexion / Inscription</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="span4">

                    <div class="newsletter">
                        <h6>Newsletter</h6>

                        <form onsubmit="$('#newsletter_subscribe').modal('show'); return false;"
                              enctype="multipart/form-data" action="/" method="post"/>

                        <div class="input-append">
                            <input type="text" class="span3" name="email"/>
                            <button class="btn" type="submit">Go!</button>
                        </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="credits">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <p>&copy; 2016 Mell Plus Informatique &middot; Tous droits réservés. </p>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>