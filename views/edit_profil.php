<?php
require '../config.php';
require("header.php");
require("menu.php");
?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a></a>
</div>
<div class="col-xl-8 col-lg-12 mx-auto">
    <div class="card card-body bg-light">
        <form action="#" method="post" class="probootstrap-form mb-5">
            <legend class="text-center"><h1>Edition profil</h1></legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prenomUser">Prénom</label>
                        <input type="text" class="form-control" id="prenomUser" name="prenomUser">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomUser">Nom</label>
                        <input type="text" class="form-control" id="nomUser" name="nomUser">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
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
                        <label class="radio-inline"><input type="radio" id="homme" name="sexe" value="homme" checked required> Homme</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" id="femme" name="sexe"  value="femme"> Femme</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" id="autre" name="sexe"  value="autre"> Autre</label>
                    </div>
                </div>
            </div>
            <!-- Form actions -->
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" name='creerUser' class="btn btn-primary btn-lg">Modifier</button>
                    <button type="reset" name='annulerCreerUser' class="btn btn-danger btn-lg">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require_once 'footer.php';
?>