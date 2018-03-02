<?php
require '../config.php';
require '../classes/messages.php';
require '../classes/chien.php';
require '../functions/messages.php';
require("header.php");
require("menu.php");

//session_start();

?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
                <div class="card card-body bg-light">
                    <div class="banner-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="banner-content">
                                        <a href="<?php echo BASE_URL?>views/dog_profil.php">
                                            <i class="fa fa-arrow-circle-left" aria-hidden="true"> Retour</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <h1><?= $_SESSION['leChienById']->getNom();?></h1>
                                    <p>
                                        <?php
                                        if ($_SESSION['leChienById']->getSexe()=='M'){
                                            echo 'Mâle';
                                        } else {
                                            echo 'Femelle';
                                        }?>
                                        <br>
                                        <?php
                                        echo $_SESSION['leChienById']->getDescription()
                                        ?>
                                    </p>
                                    <div class="card">
                                        <img class="card-img-top probootstrap-animate" src=
                                            <?php
                                            if ($_SESSION['leChienById']->getPhoto()==''){
                                                echo "http://via.placeholder.com/200x200";
                                            } else {

                                                echo BASE_URL.'images/'.$_SESSION['leChienById']->getIdAdherent().'/dogs/'.$_SESSION['leChienById']->getPhoto();
                                            }?>>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <form action="<?php echo BASE_URL.'controllers/envoyer_message_prop.php'?>" method="post" class="probootstrap-form mb-5">
                                        <div class="form-group">
                                            <label for="email">Sujet / Objet</label>
                                            <input type="sujet" class="form-control" id="sujet" name="sujet" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="message">Message</label>
                                            <textarea cols="30" rows="10" class="form-control" id="message" name="message" required></textarea>
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="submit" class="btn btn-primary" id="btnEnvoyer" name="btnEnvoyer" value="Envoyer">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
<?php
include "footer.php";

?>