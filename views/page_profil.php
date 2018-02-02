<?php
require '../config.php';
require '../classes/adherent.php';
require '../functions/users.php';

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
                            echo BASE_URL.'images/'.$_SESSION['utilisateur']->getId().'/avatars/'.$_SESSION['utilisateur']->getAvatar();
                        }?> alt="Card image cap" data-animate-effect="fadeIn">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8">
                    <div class="banner-content">
                        <h1><?= $_SESSION['utilisateur']->getNom() . ' ' . $_SESSION['utilisateur']->getPrenom(); ?></h1>
                        <p>
                            <h2>Mon adresse:</h2>
                        <p> <?= $_SESSION['utilisateur']->getAdresse()?><br> <?php echo $maVille->getCp().' '.$maVille->getNom()?></p>
                        <a href="<?php echo BASE_URL?>views/edit_profil.php"><i class="fa fa-pencil" aria-hidden="true">Modifier profil</i><span class="lnr lnr-arrow-right"></span></a>
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
            <div class="card-columns">
                <?php
                foreach ($mesChiens as $row){
                ?>
                <div class="card-img">
                    <?php echo $row->getNom() ?>
                    <img class="card-img-top probootstrap-animate" src="<?php echo BASE_URL?>images/<?php echo $row->getIdAdherent().'/dogs/'.$row->getPhoto()?>" alt="<?php echo $row->getNom()?>" data-animate-effect="fadeIn">
                    <a href="<?php echo BASE_URL?>/functions/chiens.php?idChien=<?php echo $row->getId() ?>&editDog=true">
                        <i class="fa fa-pencil" aria-hidden="true"> Modifier</i>
                    </a>
                    <a href="<?php echo BASE_URL?>/functions/chiens.php?idChien=<?php echo $row->getId() ?>&deleteDog=true">
                        <i class="fa fa-times" aria-hidden="true"> Supprimer</i>
                    </a>
                </div>
                <?php } ?>
            </div>
            
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
