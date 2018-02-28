<?php
require '../config.php';
require '../classes/race.php';
session_start();
require("header.php");
require("menu.php");
$oRace = Races::getInstance($bdd);
$oCollRace = $oRace->getCollection();
?>
    <script type="text/javascript">
        window.onload = function(){
            document.getElementById('nomChien').focus();
        }
    </script>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
</div>
    <div class="col-xl-8 col-lg-12 mx-auto">
        <div class="card card-body bg-light">
            <form class="form-horizontal" action="<?= BASE_URL ?>controllers/ajouter_chien.php" method="post" enctype="multipart/form-data">
            <!-- Form Name -->
                <legend class="text-center"><h1>Inscription de l'animal</h1></legend>
                <div class="row">
                    <!-- Text input Nom-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomChien">Nom (*)</label>
                            <input id="nomChien" name="nomChien" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>
                    <!-- Select Race-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="raceChien">Race (*)</label>
                            <select id="raceChien" name="raceChien" class="form-control">
                                <?php

                                for ($i=0; $i < count($oCollRace) ; $i++) {
                                    echo '<option value = ' . $oCollRace[$i]->getId() . '>' . $oCollRace[$i]->getNom() . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- sexe input-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sexeChien">Sexe (*)</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="radio-inline"><input type="radio" id="sexeChien" name="sexeChien" value="M" checked required> Mâle</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="radio-inline"><input type="radio" id="sexeChien" name="sexeChien"  value="F"> Femelle</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateNaissance">Date de naissance (*)</label>
                            <input id="dateNaissance" name="dateNaissance" type="date" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lofChien">Lof</label>
                            <input type="text" class="form-control" id="lofChien" name="lofChien">
                            <span class="help-block">ex : 2015049585-2016-1</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numChien">Numéro puce / tatouage</label>
                            <input type="text" class="form-control" id="numChien" name="numChien">
                            <span class="help-block">ex : 250 26 10 55101789</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="description">Description (*)</label>
                            <textarea cols="30" rows="3" class="form-control" id="description" name="description" placeholder="Dîtes nous en un peu plus sur votre chien (joyeux, timide...)." required></textarea>
                            <span class="help-block"><i>Les autres utilisateurs liront la description avec attention afin de choisir au mieux le partenaire.</i></span>
                            <br>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photoChien">Photo (*)</label>
                            <input id="photoChien" name="photoChien" type="file" class="input-file" required>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" id="submit" name="addDog" value="Ajouter">
                </div>

                <i><p>(*) : Champs obligatoires.</p></i>

            </form>
        </div>
    </div>
<?php
include "footer.php";
?>