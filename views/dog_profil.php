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
<div class="main-wrapper-first">
    <div class="banner-area">
        <div class="container">
            <div class="row height align-items-center">
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <div class="card">
                        <img class="card-img-top" src=
                            <?php
                            if ($_SESSION['monChien']->getPhoto()==''){
                                echo "http://via.placeholder.com/200x200";
                            } else {
                                echo BASE_URL.'images/'.$_SESSION['monChien']->getIdAdherent().'/dogs/'.$_SESSION['monChien']->getPhoto();
                            }?>>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <div class="banner-content">
                        <h1><?= $_SESSION['monChien']->getNom();?></h1>
                        <p>
                        <h2>Description </h2>
                        <p>
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
                        </p>
                    </div>
                    <?php
                    // si pas proprio du chien juste bouton retour mais bouton contact proprio
                    if ($_SESSION['utilisateur']->getId() != $_SESSION['monChien']->getIdAdherent()){
                        ?>
                        <a href="<?php echo BASE_URL?>views/recherche.php">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"> Retour</i>
                        </a>
                        <a href="#">
                            <i class="fa fa-address-book" aria-hidden="true"> Contact</i>
                        </a>
                    <?php
                    } else {
                    ?>
                    <a href="<?php echo BASE_URL?>views/page_profil.php">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"> Retour</i>
                    </a>
                    <a href="<?php echo BASE_URL?>functions/chiens.php?idChien=<?php echo $_SESSION['monChien']->getId(); ?>&editDog=true" >
                        <i class="fa fa-pencil" aria-hidden="true"> Modifier</i>
                    </a>
                    <a href="<?php echo BASE_URL?>functions/chiens.php?idChien=<?php echo $_SESSION['monChien']->getId(); ?>&deleteDog=true">
                        <i class="fa fa-times" aria-hidden="true"> Supprimer</i>
                    </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>