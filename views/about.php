<?php
require_once '../config.php';
session_start();
require_once 'header.php';
require_once 'menu.php';
?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
</div>
<div class="container">
    <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>Bienvenue sur <strong>Dog Dating</strong></h1>
            <h2>Solution de rencontre pour chien</h2>
        </div>
    </div><!-- row -->
</div><!-- container -->

<p>Haec et huius modi quaedam innumerabilia ultrix facinorum impiorum bonorumque praemiatrix aliquotiens operatur
    Adrastia atque utinam semper quam vocabulo duplici etiam Nemesim appellamus: ius quoddam sublime numinis efficacis,
    humanarum mentium opinione lunari circulo superpositum, vel ut definiunt alii, substantialis tutela generali
    potentia partilibus praesidens fatis, quam theologi veteres fingentes Iustitiae filiam ex abdita quadam aeternitate
    tradunt omnia despectare terrena.</p>

<section class="probootstrap-section">
    <div class="container-fluid">
        <center><h2 class="h1 mb-5 mt-0">Notre équipe</h2></center>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="owl-carousel probootstrap-owl">
                    <div class="item">
                        <img src="<?php echo BASE_URL ?>images/3/avatars/fadia.png" class="img-fluid" alt="Free Template by ProBootstrap.com">
                        <div class="p-4 border border-top-0">
                            <h4>Fedia MEDDOUR</h4>
                            <p>Chef de projet. Fedia est notre pilote de projet depuis Octobre 2017.</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo BASE_URL ?>images/2/avatars/tiona.png" class="img-fluid" alt="Free Template by ProBootstrap.com">
                        <div class="p-4 border border-top-0">
                            <h4>Tiona RALIJAONA </h4>
                            <p>Développeur.</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo BASE_URL ?>images/1/avatars/ayhann.png" class="img-fluid" alt="Free Template by ProBootstrap.com">
                        <div class="p-4 border border-top-0">
                            <h4>Ayhann DENIZ</h4>
                            <p>Développeur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
<script src="../assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.waypoints.min.js"></script>
<script src="../assets/js/imagesloaded.pkgd.min.js"></script>
<script src="../assets/js/main.js"></script>
<?php
require_once 'footer.php';
?>



