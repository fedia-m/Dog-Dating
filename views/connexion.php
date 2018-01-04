<?php
require_once '../config.php';
include("header.php");
include("menu.php");
?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a></a>
</div>
<div class="container-fluid">
    <div class="col-xl-6 col-lg-10 mx-auto">
        <div class="card card-body bg-light">
            <form action="#" method="post" class="probootstrap-form mb-5">
                <legend class="text-center"><h1>Connexion</h1></legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" id="login" name="login">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="motDePasse">Mot de passe</label>
                            <input type="password" class="form-control" id="motDePasse" name="motDePasse">
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" name='btnConnexion' class="btn btn-primary btn-lg">Connexion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- END row -->
<?php
include 'footer.php';
?>