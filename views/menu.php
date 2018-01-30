<?php
include 'header.php';
?>

<body>

<aside class="probootstrap-aside js-probootstrap-aside">
    <a href="#" class="probootstrap-close-menu js-probootstrap-close-menu d-md-none"><span class="oi oi-arrow-left"></span> Fermer</a>
    <div class="probootstrap-site-logo probootstrap-animate" data-animate-effect="fadeInLeft">

        <a href="<?php echo BASE_URL?>" class="mb-2 d-block probootstrap-logo">Dog Dating</a>
        <p class="mb-0">Solution de rencontre pour chien</p>
    </div>
    <div class="probootstrap-overflow">
        <nav class="probootstrap-nav">
            <ul>
                <?php
                if(!isset($_SESSION['utilisateur']))
                {
                    ?>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>"><i class="fa fa-home" aria-hidden="true"> Accueil</i></a></li>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>views/about.php"><i class="fa fa-question-circle-o" aria-hidden="true"> About</i></a></li>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>views/contact.php"><i class="fa fa-address-book-o" aria-hidden="true"> Contact</i></a></li>
                    <?php
                }
                else{
                    ?>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>"><i class="fa fa-home" aria-hidden="true"> Accueil</i></a></li>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>views/about.php"><i class="fa fa-question-circle-o" aria-hidden="true"> About</i></a></li>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>views/page_profil.php"><i class="fa fa-user" aria-hidden="true"> Mon profil</i></a></li>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>views/recherche.php"><i class="fa fa-search" aria-hidden="true"> Recherche</i></a></li>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>views/contact.php"><i class="fa fa-address-book-o" aria-hidden="true"> Contact</i></a></li>
                    <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="<?php echo BASE_URL?>views/add_dog.php"><i class="fa fa-plus" aria-hidden="true"> Ajouter un chien</i></a></li>
                    <?php
                } ?>

            </ul>
        </nav>
        <footer class="probootstrap-aside-footer probootstrap-animate" data-animate-effect="fadeInLeft">
                <ul class="list-unstyled">
                    <?php
                    if(!isset($_SESSION['utilisateur']))
                    {
                        ?>
                        <li><a href="<?php echo BASE_URL?>views/connexion.php" class="p-0"><i class="fa fa-sign-in" aria-hidden="true"> Connexion</a></i></li>
                        <li><a href="<?php echo BASE_URL?>views/inscription.php" class="p-0"><i class="fa fa-user-plus" aria-hidden="true"> Inscription </a></i></li>
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="<?php echo BASE_URL?>views/page_profil.php" class="p-0"><i class="fa fa-user" aria-hidden="true"> Mon profil</i></a></li>
                        <li><a href="<?php echo BASE_URL?>views/deconnexion.php" class="p-0"><i class="fa fa-sign-out" aria-hidden="true">Deconnexion</i></a></li>
                        <?php
                    } ?>
                </ul>
            <ul class="list-unstyled d-flex probootstrap-aside-social">
                <li><a href="http://www.twitter.com" class="p-2"><i id="social-tw" class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="http://www.instagram.com" class="p-2"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="http://www.facebook.com" class="p-2"><i class="fa fa-facebook-official" id="social-fb" aria-hidden="true"></i></a></li>
                <li><a href="http://www.google.com" class="p-2"><i id="social-gp" class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
            <p> &copy;  Copyright <?php echo date('Y')?><a href="#" target="_blank"> TAF CESI</a>.</p>
        </footer>
    </div>
</aside>
<main role="main" class="probootstrap-main js-probootstrap-main">