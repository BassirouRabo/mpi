<?php
session_start();
try {
    $bdd = new PDO("pgsql:host=localhost;dbname=mpi", "postgres", "demo");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
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

    <title>Boutique </title>


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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
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
                                    <a href="panier.php?ref=<?php echo $_SESSION['reference']; ?> "
                                       title="Go to cart &rarr;">
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

        <section class="category">

            <div class="container">
                <div class="row">

                    <div class="span3">

                        <aside class="sidebar">

                            <div class="children">
                                <div class="box border-top">

                                    <div class="hgroup title">
                                        <h3>
                                            <a href="boutique.php" title="Produits">Produits</a>
                                        </h3>
                                    </div>

                                    <ul class="category-list secondary">
                                        <?php

                                        $reponse = $bdd->query('SELECT * FROM categorie') or die(print_r($bdd->errorInfo()));

                                        while ($donnees = $reponse->fetch()) {
                                            ?>
                                            <?php
                                            if (isset($_GET['ref']) AND $_GET['ref'] != null) {
                                                strip_tags($_POST['ref']);
                                                ?>

                                                <?php
                                                if ($_GET['ref'] == $donnees['id']) {
                                                    ?>
                                                    <li class="current"><a
                                                            href="boutique.php?ref=<?php echo $donnees['id']; ?>"
                                                            title="<?php echo $donnees['categorie']; ?>"><?php echo $donnees['categorie']; ?></a>
                                                    </li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li><a href="boutique.php?ref=<?php echo $donnees['id']; ?>"
                                                           title="<?php echo $donnees['categorie']; ?>"><?php echo $donnees['categorie']; ?></a>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            } else {
                                                ?>
                                                <li><a href="boutique.php?ref=<?php echo $donnees['id']; ?>"
                                                       title="<?php echo $donnees['categorie']; ?>"><?php echo $donnees['categorie']; ?></a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        $reponse->closeCursor();
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="price-filter">
                                <div class="box border-top">
                                    <div class="hgroup title">
                                        <h3>Refine produit</h3>
                                        <h5>Filter les produits par prix</h5>
                                    </div>

                                    <div id="slider" data-max="200" data-step="5" data-currency="&pound;"></div>
                                    <span id="slider-label">Price range: <strong>0 &ndash; 20000</strong></span>
                                </div>
                            </div>


                        </aside>

                    </div>


                    <div class="span9">

                        <ul class="product-list isotope">
                            <?php
                            $reponse = null;

                            if (isset($_GET['ref']) and $_GET['ref'] != null) {
                                strip_tags($_POST['ref']);
                                $reponse = $bdd->prepare('SELECT * FROM produit WHERE categorie_id = :id');
                                $reponse->execute(array('id' => $_GET['ref'])) or die(print_r($bdd->errorInfo()));
                            } else {
                                $reponse = $bdd->query('SELECT * FROM produit') or die(print_r($bdd->errorInfo()));
                            }


                            if ($reponse != null) {
                                while ($donnees = $reponse->fetch()) {
                                    ?>
                                    <li class="standard" data-price="<?php echo $donnees['prix']; ?>">
                                        <a href="produit.php?ref=<?php echo $donnees['id']; ?>"
                                           title="<?php echo $donnees['nom']; ?>">

                                            <div class="image">
                                                <img class="primary"
                                                     src="img/produits/<?php echo $donnees['image']; ?>.jpg"
                                                     alt="<?php echo $donnees['nom']; ?>"/>
                                                <img class="secondary"
                                                     src="img/produits/<?php echo $donnees['image']; ?>.jpg"
                                                     alt="<?php echo $donnees['nom']; ?>"/>
                                            </div>

                                            <div class="title">
                                                <div class="prices">
                                                    <span class="price"><?php echo $donnees['prix']; ?> CFA</span>
                                                </div>
                                                <h3><?php echo $donnees['nom']; ?></h3>
                                            </div>

                                        </a>
                                    </li>

                                    <?php
                                }
                            }
                            $reponse->closeCursor();
                            ?>
                        </ul>

                    </div>


                </div>
            </div>

        </section>

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
                                <a href="boutique.php" title="Boutique" class="title">Boutique</a>
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