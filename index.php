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

    <title>Home | Mell Plus Informatique</title>


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
                            <a href="index.php" title="&larr; Accueil">
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
                                    <?php
                                    if (isset($_SESSION['reference'])) {
                                        ?>
                                        <a href="panier.php?ref=<?php echo $_SESSION['reference']; ?> "
                                           title="Go to cart &rarr;">
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="connexion.php" title="Connexion"></a>
                                        <?php
                                    }
                                    ?>

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
                                <a href="index.php" title="Accueil" class="title">Accueil</a>
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
                            <option value="groupe.html"/>
                            Groupe mellplus
                            <option value="prestations.html"/>
                            Prestations
                            <option value="departement.html"/>
                            Département
                            <option value="boutique.html"/>
                            Boutique
                            <option value="contact.html"/>
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

        <section class="home">


            <section class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="img/slides/4.jpg" alt=""/>

                        <div class="caption">
                            <div class="container">
                                <div class="span6 offset6 text-right">
                                    <h3>L'informatique à jour</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="img/slides/4.jpg" alt=""/>

                        <div class="caption">
                            <div class="container">
                                <div class="span6 offset6 text-right">
                                    <h3>L'informatique à jour</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="img/slides/4.jpg" alt=""/>

                        <div class="caption">
                            <div class="container">
                                <div class="span6 offset6 text-right">
                                    <h3>L'informatique à jour</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="img/slides/4.jpg" alt=""/>

                        <div class="caption">
                            <div class="container">
                                <div class="span6 offset6 text-right">
                                    <h3>L'informatique à jour</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="promos">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                            <div class="free-shipping">
                                <div class="box border-top">
                                    <img src="img/free-shipping.png" alt=""/>

                                    <div class="hgroup title">
                                        <h3>Respect Strict des Délais</h3>
                                    </div>
                                    <p>Du fait de la maitrise de nos métiers, de la fiabilité de nos partenaires, nous
                                        vous garantisson le respect des délais que vous nous accordez</p>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="world-shipping">
                                <div class="box border-top">
                                    <img src="img/world-shipping.png" alt=""/>

                                    <div class="hgroup title">
                                        <h3>Mell Plus SAV</h3>
                                    </div>
                                    <p>Tout achat vous donne droit au service correspondant pour assurer la mailleur
                                        exploiattion de vos acquisitions.</p>
                                </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="low-price">
                                <div class="box border-top">
                                    <img src="img/low-price.png" alt=""/>

                                    <div class="hgroup title">
                                        <h3>Meilleur rapport qualité/prix</h3>
                                    </div>
                                    <p>Vous offrir les tarifs juste est pour nous une obligation profesionnelle et une
                                        assurance de votre satisfaction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="featured">
                <div class="container">

                    <div class="row">
                        <div class="span9">
                            <ul class="product-list isotope">
                                <?php
                                $reponse = $bdd->query('SELECT * FROM produit') or die(print_r($bdd->errorInfo()));

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
                                $reponse->closeCursor();
                                ?>
                            </ul>
                        </div>

                        <div class="span3">
                            <div class="widget Categories">
                                <h3 class="widget-title widget-title ">Categories</h3>
                                <ul>
                                    <li>
                                        <a href='boutique.php' class="title">Laptop</a>

                                        <ul>
                                            <li>
                                                <a href='boutique.php' class="title">Samsung</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Toshiba</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Dell</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Le Novo</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href='boutique.php' class="title">Apple</a>

                                        <ul>
                                            <li>
                                                <a href='boutique.php' class="title">Mackbook Pro 17</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Mackbook Pro i5</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Iphone</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Ipad Retina</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href='boutique.php' class="title">Réseau</a>

                                        <ul>
                                            <li>
                                                <a href='boutique.php' class="title">Serveur</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Routeur</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Switch</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Connecteur</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href='boutique.php' class="title">Sécurité</a>

                                        <ul>
                                            <li>
                                                <a href='boutique.php' class="title">Camera</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Antivol</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Antivirus</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        <a href='boutique.php' class="title">Consommable</a>

                                        <ul>
                                            <li>
                                                <a href='boutique.php' class="title">Imprimante</a>
                                            </li>
                                            <li>
                                                <a href='boutique.php' class="title">Photocopieuse</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </div>


                        </div>
                    </div>

                </div>
            </section>


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