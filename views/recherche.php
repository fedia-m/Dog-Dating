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
//On recupere tous les chiens sauf ceux de l'user connecté car il recherche des chiens
for ($i=0;$i<count($oCollChien);$i++)
{
    if ($oCollChien[$i]->getIdAdherent() != $_SESSION['utilisateur']->getId() && $oCollChien[$i]->getDisponible() == "1")
    {
        $oCollChienRecherche[] = $oCollChien[$i];
    }
}

?>
    <div class="probootstrap-bar">
        <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
    </div>
    <div class="main-wrapper">
        <div class="working-process-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center">
                            <h2>Les Chiens</h2>
                        </div>
                    </div>
                </div>
                <div class="card-columns">
                    <?php
                    foreach ($oCollChienRecherche as $row){
                        ?>

                        <div class="card w-100">
                            <a href="<?php echo BASE_URL?>functions/chiens.php?idChien=<?php echo $row->getId()?>&dogProfil=true">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row->getNom() ?></h5>
                                    <p class="card-text">Propriétaire : <?php echo $row->getNomAdherentParId($bdd,$row->getIdAdherent()) ?></p>
                                    <p class="card-text"><?php echo $row->getDescription() ?></p>
                                    <p class="card-text">
                                        <img src="<?php echo BASE_URL?>images/<?php echo $row->getIdAdherent().'/dogs/'.$row->getPhoto()?>" class="img-fluid" alt="<?php echo $row->getNom();?>">
                                    </p>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
require ("footer.php");