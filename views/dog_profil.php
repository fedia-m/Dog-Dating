<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 03/02/18
 * Time: 10:46
 */
require '../config.php';
require_once '../classes/adherent.php';
require_once '../classes/ville.php';
require_once '../classes/chien.php';
require_once '../classes/race.php';
require '../functions/users.php';

require("header.php");
require("menu.php");
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
                                        <?php
                                        // si pas proprio du chien juste bouton retour mais bouton contact proprio
                                        if ($_SESSION['utilisateur']->getId() != $_SESSION['monChien']->getIdAdherent()){
                                            ?>
                                            <a href="<?php echo BASE_URL?>views/recherche.php">
                                                <i class="fa fa-arrow-circle-left" aria-hidden="true"> Retour</i>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo BASE_URL?>views/page_profil.php">
                                                <i class="fa fa-arrow-circle-left" aria-hidden="true"> Retour</i>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <?php
                                    if ($_SESSION['utilisateur']->getId() == $_SESSION['monChien']->getIdAdherent()){
                                        ?>
                                        <a href="<?php echo BASE_URL?>functions/chiens.php?idChien=<?php echo $_SESSION['monChien']->getId(); ?>&editDog=true" >
                                            <i class="fa fa-pencil" aria-hidden="true"> Modifier</i>
                                        </a>
                                        <a href="<?php echo BASE_URL?>controllers/supprimer_chien.php?idChien=<?php echo $_SESSION['monChien']->getId(); ?>">
                                            <i class="fa fa-times" aria-hidden="true"> Supprimer</i>
                                        </a>
                                        <?php
                                    }?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="card">
                                        <img class="card-img-top probootstrap-animate" src=
                                            <?php
                                            if ($_SESSION['monChien']->getPhoto()==''){
                                                echo "http://via.placeholder.com/200x200";
                                            } else {
                                                echo BASE_URL.'images/'.$_SESSION['monChien']->getIdAdherent().'/dogs/'.$_SESSION['monChien']->getPhoto();
                                            }?>>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="banner-content">
                                        <h1><?= $_SESSION['monChien']->getNom();?></h1>
                                        <p>
                                            <h2>Description </h2>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    Race <?php echo $_SESSION['raceChien']->getNom(); ?>
                                                </div>
                                                <div class="row">
                                                    Lof <?php echo $_SESSION['monChien']->getLof(); ?>
                                                </div>
                                                <div class="row">
                                                    Date <?php
                                                    $phpdate = strtotime( $_SESSION['monChien']->getNaissance() );
                                                    $mysqldate = date( 'd/m/Y', $phpdate );
                                                    echo $mysqldate;
                                                    ?>
                                                </div>
                                                <div class="row">
                                                    <?php echo $_SESSION['monChien']->getDescription();?>
                                                </div>
                                            </div>
                                        <br>
                                        <?php
                                        if ($_SESSION['utilisateur']->getId() != $_SESSION['monChien']->getIdAdherent()){
                                            ?>
                                            <a href="#">
                                                <div class="form-group text-center">
                                                    <input type="button" class="btn btn-primary" id="btnContacter" name="btnContacter" value="Contact">
                                                </div>
                                            </a>
                                            <?php
                                        }
                                        ?>

                                        </p>
                                    </div>
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
include 'footer.php';
?>