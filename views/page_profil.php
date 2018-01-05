<?php
require '../config.php';
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
                        <img class="card-img-top probootstrap-animate" src="<?php echo BASE_URL?>/avatars/Alexandra.png" alt="Card image cap" data-animate-effect="fadeIn">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8">
                    <div class="banner-content">
                        <h1> Prénom NOM</h1>
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
<?php
include 'footer.php';
?>
