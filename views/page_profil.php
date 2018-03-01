<?php
require '../config.php';
require '../classes/adherent.php';
require '../classes/chien.php';
require '../classes/ville.php';
//require '../functions/users.php';
session_start();
require("header.php");
require("menu.php");

$oChiens = Chiens::getInstance($bdd);
$oCollChien = $oChiens->getCollection();
//L'utilisateur n'as pas de chien pour l'instant, utile pour afficher ses chiens plutard
$avoirChien = false;
for ($i=0;$i<count($oCollChien);$i++)
{
    if ($oCollChien[$i]->getIdAdherent() == $_SESSION['utilisateur']->getId())
    {
        $chienUser[] = $oCollChien[$i];
        $avoirChien = true;
    }
}
$aVille = new Ville();
$aVille->getNomParId($bdd,$_SESSION['utilisateur']->getIdVille());
?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
</div>
<div class="main-wrapper-first">
    <div class="banner-area">
        <div class="container">
            <div class="row height ">
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="card">
                        <img class="card-img-top probootstrap-animate" src=
                        <?php
                        if ($_SESSION['utilisateur']->getAvatar()==''){
                            echo "http://via.placeholder.com/200x200";
                        } else {
                            echo BASE_URL.'images/'.$_SESSION['utilisateur']->getId().'/avatars/'.$_SESSION['utilisateur']->getAvatar();
                        }?>>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <div class="banner-content">
                        <h1><?= $_SESSION['utilisateur']->getNom() . ' ' . $_SESSION['utilisateur']->getPrenom(); ?></h1>
                        <p>
                            <h2>Mon adresse:</h2>
                        <p> <?= $_SESSION['utilisateur']->getAdresse()?><br> <?php echo $aVille->getCp().' '.$aVille->getNom()?></p>
                        <a href="<?php echo BASE_URL?>views/edit_profil.php"><i class="fa fa-pencil" aria-hidden="true">Modifier profil</i><span class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1">
                    <div class="banner-content">
                        <a href="<?php echo BASE_URL?>views/mes_messages.php"><i class=" fa fa-envelope fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="main-wrapper">
    <div class="working-process-area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center">
                        <h1>Mes Chiens </h1>
                    </div>
                </div>
                <div class="col-lg-2">
                    <a href="<?php echo BASE_URL?>views/add_dog.php">
                        <i class="fa fa-plus" aria-hidden="true"> Ajouter</i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="container-fluid      card-columns">
                <?php
                //Si l'user n'as pas de chien
                if (!$avoirChien){
                    echo "Vous n'avez pas de chien";
                }
                //L'user a des chiens
                else{
                foreach ($chienUser as $row){
                ?>

                    <div class="card w-100">
                        <a href="<?php echo BASE_URL?>functions/chiens.php?idChien=<?php echo $row->getId()?>&dogProfil=true">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row->getNom() ?></h5>
                                <p class="card-text"><?php echo $row->getDescription() ?></p>
                                <p class="card-text">
                                    <img src="<?php echo BASE_URL?>images/<?php echo $row->getIdAdherent().'/dogs/'.$row->getPhoto()?>" class="img-fluid" alt="<?php echo $row->getNom();?>">
                                </p>
                            </div>
                        </a>
                    </div>
                <?php
                }
                }//Fin du else si pas de chien
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
