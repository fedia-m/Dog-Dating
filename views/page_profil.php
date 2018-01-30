<?php
require '../config.php';
require '../classes/adherent.php';
session_start();
require("header.php");
require("menu.php");

?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a></a>
</div>
<div class="main-wrapper-first">
    <div class="banner-area">
        <div class="container">
            <div class="row height align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="card">
                        <img class="card-img-top probootstrap-animate" src=
                        <?php
                        if ($_SESSION['utilisateur']->getAvatar()==''){
                            echo "http://via.placeholder.com/200x200";
                        } else {
                            echo BASE_URL.'avatars/'.$_SESSION['utilisateur']->getAvatar();
                        }?> alt="Card image cap" data-animate-effect="fadeIn">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8">
                    <div class="banner-content">
                        <h1><?= $_SESSION['utilisateur']->getNom() . ' ' . $_SESSION['utilisateur']->getPrenom(); ?></h1>
                        <p>
                            <h2>Mon adresse:</h2>
                        <p> 56 rue Mirabeau<br> 69000 LYON</p>
                        <a href="<?php echo BASE_URL?>views/edit_profil.php" ><span class="icon-plus">Modifier profil</span><span class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="main-wrapper">
    <div class="working-process-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2>Mes Chiens</h2>
                    </div>
                </div>
            </div>
            <div class="card-columns">
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_1.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_2.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_3.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_4.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_5.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_6.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_7.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_8.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_9.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_10.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_11.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_12.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_13.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_14.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_15.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_16.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_17.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_18.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_19.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_20.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
                <div class="card">
                    <a href="single.php">
                        <img class="card-img-top probootstrap-animate" src="../images/img_21.jpg" alt="Card image cap" data-animate-effect="fadeIn">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
