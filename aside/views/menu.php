<?php
require 'header.php';
?>
<body>

<aside class="probootstrap-aside js-probootstrap-aside">
    <a href="#" class="probootstrap-close-menu js-probootstrap-close-menu d-md-none"><span class="oi oi-arrow-left"></span> Close</a>
    <div class="probootstrap-site-logo probootstrap-animate" data-animate-effect="fadeInLeft">

        <a href="../index.php" class="mb-2 d-block probootstrap-logo">Dog Dating</a>
        <p class="mb-0">Solution de rencontre pour chien</p>
    </div>
    <div class="probootstrap-overflow">
        <nav class="probootstrap-nav">
            <ul>
                <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="index.php">Accueil</a></li>
                <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="views/about.php">About</a></li>
                <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="views/services.php">Services</a></li>
                <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="views/portfolio.php">Recherche</a></li>
                <li class="probootstrap-animate" data-animate-effect="fadeInLeft"><a href="views/contact.php">Contact</a></li>
            </ul>
        </nav>
        <footer class="probootstrap-aside-footer probootstrap-animate" data-animate-effect="fadeInLeft">
            <ul class="list-unstyled d-flex">
                <li><a href="#" class="p-2"><span class="icon-add-user">Inscription </a></span></li>
                <li><a href="#" class="p-2"><span class="icon-login">Connexion</a></span></li>
            </ul>
            <ul class="list-unstyled d-flex probootstrap-aside-social">
                <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
                <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
                <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
                <li><a href="#" class="p-2"><span class="icon-google-play"></span></a></li>
            </ul>
            <p> &copy;  Copyright <?php echo date('Y')?><a href="#" target="_blank">TAF CESI</a>. <br> All Rights Reserved.</p>
        </footer>
    </div>
</aside>