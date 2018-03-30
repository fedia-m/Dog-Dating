<?php
require '../config.php';
session_start();
require("header.php");
require("menu.php");
?>
    <script type="text/javascript">
        window.onload = function(){
            document.getElementById('pseudo').focus();
        }
    </script>

<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a></a>
</div>
<div class="container-fluid">
    <div class="col-xl-6 col-lg-10 mx-auto">
        <div class="card card-body bg-light">
            <form action="<?= BASE_URL ?>controllers/connect.php" method="post" class="probootstrap-form mb-5">
                <legend class="text-center"><h1>Connexion</h1></legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" id="pseudo" name="pseudo" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="motDePasse">Mot de passe</label>
                            <input type="password" class="form-control" id="motDePasse" name="motDePasse" required="">
                        </div>
                    </div>
                </div>
                <p><i><a href="#">Mot de passe oublié ?</a></i></p>
                <!-- Button -->
                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" name='btnConnexion' class="btn btn-primary btn-lg">Connexion</button>
                    </div>
                </div>
                <?php
                    if(isset($_GET['e']) && $_GET['e'] <> ""){
                ?>
                <span style="color:red"><i class="fa fa-exclamation-triangle"></i> <?php
                    if ($_GET['e'] == sha1('2')){
                        echo "Erreur de vos identifiants!";
                    };
                    ?></span>
                <?php }
                ?>
            </form>
        </div>
    </div>
</div>

    <!-- END row -->
<?php
include 'footer.php';
?>