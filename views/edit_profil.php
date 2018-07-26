<?php
require '../config.php';
require '../classes/adherent.php';
require '../classes/ville.php';
require '../classes/chien.php';
require '../functions/users.php';
//require '../functions/users.php';
//session_start();
require("header.php");
require("menu.php");


$oVilles = Villes::getInstance($bdd);
$oCollVille = $oVilles->getCollection();
//L'utilisateur n'as pas de chien pour l'instant, utile pour afficher ses chiens plutard
//var_dump($oVilles);

?>
    <div class="probootstrap-bar">
        <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
    </div>
    <div class="col-xl-8 col-lg-12 mx-auto">
        <div class="card card-body bg-light">
            <form action="<?php echo BASE_URL?>controllers/modifier_adherent.php" method="post" class="probootstrap-form mb-5">
                <legend class="text-center"><h1>Edition profil</h1></legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenomUser">Prénom</label>
                            <input type="text" class="form-control" id="prenomUser" name="prenomUser" value="<?php echo $_SESSION['utilisateur']->getPrenom(); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomUser">Nom</label>
                            <input type="text" class="form-control" id="nomUser" name="nomUser" value="<?php echo $_SESSION['utilisateur']->getNom(); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $_SESSION['utilisateur']->getPseudo(); ?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['utilisateur']->getMail(); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p><a href="#" onclick="modifierMdp();return false;"><span class="icon-lock">Modifier mot de passe</span></a></p>
                        </div>
                    </div>
                </div>
                <div id="mdp" hidden>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="motDePasse">Ancien mot de passe</label>
                                <input type="password" class="form-control" id="AncienMotDePasse" name="AncienMotDePasse">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="motDePasse">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="motDePasse" name="motDePasse">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="motDePasse">Confirmation</label>
                                <input type="password" class="form-control" id="motDePasse2" name="motDePasse2">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sexe input-->
                <div class="row">
                    <div class="col-md-6">
                        <label for="sexe">Votre sexe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" id="homme" name="sexe" value="H" <?php if ($_SESSION['utilisateur']->getSexe()=='H') echo "checked" ; ?> > Homme</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" id="femme" name="sexe"  value="F" <?php if ($_SESSION['utilisateur']->getSexe()=='F') echo "checked" ; ?>> Femme</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" id="autre" name="sexe"  value="A" <?php if ($_SESSION['utilisateur']->getSexe()=='A') echo "checked" ; ?>> Autre</label>
                        </div>
                    </div>
                </div>
                <!--Adresse adherent -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sexe">Votre adresse</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $_SESSION['utilisateur']->getAdresse(); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <section id="input">
                            <div class="half form-group">
                                <input id="code" name="cp" value="<?php echo $maVille->getCp(); ?>" autocomplete="off" autofocus="" class="form-control">
                            </div>
                        </section>
                    </div>
                    <div class="col-md-7">
                        <section id="input">
                            <div class="half form-group">
                                <input id="city" name="ville" value="<?php echo $maVille->getNom(); ?>" autocomplete="off" class="form-control">
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <section id="output"></section>
                </div>
                <!--Avatar adherent -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sexe">Votre photo</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="file" name="photo">
                        </div>
                    </div>
                </div>
                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" name='editUser' class="btn btn-primary btn-lg">Modifier</button>
                        <a href="<?php echo BASE_URL.'views/page_profil.php'?>"><button type="button" name='annulerCreerUser' class="btn btn-danger btn-lg">Annuler</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
require_once 'footer.php';
?>