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
        <meta charset="UTF-8" />

<meta name="description" content="" />
<meta name="keywords" content="" />
        <meta name="author" content="APKode.net"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Paiement</title>


<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="css/fonts/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="css/flexslider.css" />

<link rel="stylesheet" type="text/css" href="css/color-schemes/core.css" />
<link rel="stylesheet" type="text/css" href="css/color-schemes/turquoise.css" id="color_scheme" />




<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link href="http://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Shadows+Into+Light" rel="stylesheet" type="text/css" />

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
                                        <a href="connexion.php" title="Connexion">Connexion</a>
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
                                                <input type="text" name="query" id="query"
                                                       placeholder="Recherche&hellip;"
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
                
                <section class="checkout">


                    <div class="container">
                        <form enctype="multipart/form-data" action="#" method="post"/>
                           
                            <div class="row">
                                <div class="span9">
                                    <div class="box">
                                        

                                        <div id="checkout-content">
                                            <div class="box-header">
                                                <h3>Adresse de livraison</h3>
                                            </div>

                                            <div class="box-content">
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label for="first_name" class="control-label">Nom</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="" name="first_name" id="first_name" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label for="last_name" class="control-label">Prénom</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="" name="last_name" id="last_name" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label for="email" class="control-label">Email</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="" name="email" id="email" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label for="phone" class="control-label">Téléphone</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="" name="phone" id="phone" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label for="company" class="control-label">Compagnie</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="" name="company" id="company" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label for="street_address"
                                                                   class="control-label">Adresse</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="" name="street_address" id="street_address" />
                                                            </div>
                                                        </div>

                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label for="city"
                                                                           class="control-label">Ville</label>
                                                                    <div class="controls">
                                                                        <input class="span12" type="text" value="" name="city" id="city" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label for="zip" class="control-label">BP</label>
                                                                    <div class="controls">
                                                                        <input class="span12" type="text" value="" name="zip" id="zip" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label for="country"
                                                                           class="control-label">Ville</label>
                                                                    <div class="controls">
                                                                        <select class="span12" id="country" name="country">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label for="state"
                                                                           class="control-label">Pays</label>
                                                                    <div class="controls">
                                                                        <div id="states">
                                                                            <select class="span12" id="state" name="state">                                                                                
                                                                            </select>							
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>

                                            <div class="box-footer">
                                                <div class="pull-left">
                                                    <a href="panier.php" class="btn btn-small">
                                                        <i class="icon-chevron-left"></i> &nbsp; Retour au panier
                                                    </a>
                                                </div>

                                                <div class="pull-right">                                                    
                                                    <button type="submit" class="btn btn-primary">
                                                        Valider &nbsp; <i class="icon-chevron-right"></i>
                                                    </button>
                                                </div>
                                            </div>					
                                        </div>	

                                    </div>
                                </div>

                                <div class="span3">                                    
                                    <div class="box">
    <div id="checkout-totals">
        <div class="hgroup title">
            <h3>Total commande</h3>
        </div>
        <ul class="price-list">
            <li>Prix initial: <strong>247.000</strong></li>
            <li>Envoie: <strong>£0.00</strong></li>
            <li>TVA: <strong>0.00</strong></li>
            <li class="important">Total: <strong>247.000</strong></li>
        </ul>
    </div>
</div>                                </div>
                            </div>
                        </form>
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
                                        <a href="groupe.php" title="Groupe Mell Plus" class="title">Groupe Mell
                                            Plus</a>
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
                                        <a href="connexion.php" title="Connexion">Connexion</a>
                                    </li>
                                    <li>
                                        <a href="inscription.html" title="Inscription">Inscription</a>
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