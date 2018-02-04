<?php
require '../config.php';
require '../classes/adherent.php';
require '../classes/race.php';
require '../classes/chien.php';
require '../functions/chiens.php';
require("header.php");
require("menu.php");

$oRace = Races::getInstance($bdd);
$oCollRace = $oRace->getCollection();


?>
    <div class="probootstrap-bar">
        <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
    </div>

    <div class="col-xl-8 col-lg-12 mx-auto">
        <div class="card card-body bg-light">
            <form class="form-horizontal" action="#" method="post">
                <legend class="text-center"><h1>Modifier <?php echo $_SESSION['monChien']->getNom()?></h1></legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="card">
                                <img class="card-img-top probootstrap-animate" src=
                                <?php
                                if ($_SESSION['monChien']->getPhoto()==''){
                                    echo "http://via.placeholder.com/200x200";
                                } else {
                                    echo BASE_URL.'images/'.$_SESSION['utilisateur']->getId().'/dogs/'.$_SESSION['monChien']->getPhoto();
                                }?>>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="message">Description</label>
                        <textarea class="form-control" id="message" name="Description"><?php echo  $_SESSION['monChien']->getDescription() ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photoChien">Photo (*)</label>
                            <input type="file" class="input-file" id="photoChien" name="photoChien">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Text input Nom-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomchien">Nom (*)</label>
                            <input id="nomchien" name="nomchien" type="text" class="form-control input-md" required="" value="<?php echo $_SESSION['monChien']->getNom()?>">
                        </div>
                    </div>
                    <!-- Select Race-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="raceChien">Race (*)</label>
                            <select id="raceChien" name="raceChien" class="form-control">
                                <?php

                                for ($i=0; $i < count($oCollRace) ; $i++) {
                                    ?>
                                    <option value ="<?php echo $oCollRace[$i]->getId(); ?>"
                                        <?php
                                            if ($oCollRace[$i]->getId()==$_SESSION['monChien']->getIdRace()){
                                                echo 'selected';
                                        }
                                        ?>
                                    >
                                        <?php
                                        echo $oCollRace[$i]->getNom(); ?>
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>

                <!-- sexe input-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sexeChien">Sexe (*)</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="radio-inline"><input type="radio" id="sexeChien" name="sexeChien" value="M" <?php if ($_SESSION['monChien']->getSexe()=='M') echo "checked" ; ?> required> Mâle</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="radio-inline"><input type="radio" id="sexeChien" name="sexeChien"  value="F" <?php if ($_SESSION['monChien']->getSexe()=='F') echo "checked" ; ?>> Femelle</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateNaissance">Date de naissance (*)</label>
                            <input id="dateNaissance" name="dateNaissance" type="date"  value="<?php echo $_SESSION['monChien']->getNaissance()?>" class="form-control input-md" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lofChien">Lof</label>
                            <input type="text" class="form-control" id="lofChien" name="lofChien" value="<?php echo $_SESSION['monChien']->getLof()?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numChien">Numéro puce / tatouage</label>
                            <input type="text" class="form-control" id="numChien" value="<?php echo $_SESSION['monChien']->getNumeroPuce()?>" name="numChien">
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Modifier">
                    <a href="<?php echo BASE_URL.'views/dog_profil.php'?>"><input type="button" class="btn btn-danger" id="submit" name="submit" value="Annuler"></a>
                </div>

                    <p><i>(*) : Champs obligatoires.</i></p>

            </form>
        </div>
    </div>
<?php
include "footer.php";
?>