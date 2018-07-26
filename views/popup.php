<?php
require '../config.php';
require("header.php");
require("menu.php");
require '../functions/users.php';


echo $_POST[$userInscrit];

if ($userInscrit) {
    ?>
    <div class="probootstrap-bar">
        <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a></a>
    </div>
    <p><i>Bienvenu sur Dog-Dating</i></p>
    <!-- Button -->
    <!-- Form actions -->
    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="button" name='btnConnexion' class="btn btn-primary btn-lg" onclick=reorientation()>Connexion</button>
        </div>
    </div>
    <?php
    include 'footer.php';
}
?>
