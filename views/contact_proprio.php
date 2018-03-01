<?php
require '../config.php';
require '../classes/messages.php';
require '../functions/messages.php';
require("header.php");
require("menu.php");

?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
</div>

<div class="container-fluid">
    <div class="col-xl-8 col-lg-12 mx-auto">
        <div class="card card-body bg-light">
            <div class="row">
                <div class="col-xl-8 col-lg-12 mx-auto">
                    <form action="#" method="post" class="probootstrap-form mb-5">
                        <legend class="text-center"><h1>Contact</h1></legend>
                        <div class="form-group">
                            <label for="email">Sujet / Objet</label>
                            <input type="sujet" class="form-control" id="sujet" name="sujet" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="message">Message</label>
                            <textarea cols="30" rows="10" class="form-control" id="message" name="message" required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" id="btnEnvoyer" name="btnEnvoyer" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END row -->
</div>

<?php
include "footer.php";

?>