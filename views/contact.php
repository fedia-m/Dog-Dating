<?php
require '../config.php';
session_start();
require("header.php");
require("menu.php");
?>
<div class="probootstrap-bar">
    <a href="#" class="probootstrap-toggle js-probootstrap-toggle"><span class="oi oi-menu"></span></a>
</div>
<div class="container-fluid">
    <div class="col-xl-8 col-lg-12 mx-auto">
        <p class="mb-5"><img src="<?php echo BASE_URL?>images/contact.jpg" alt="image de contact" class="img-fluid"></p>
        <div class="card card-body bg-light">
            <div class="row">
                <div class="col-xl-8 col-lg-12 mx-auto">
                    <form action="<?php echo BASE_URL?>functions/contact.php" method="post" class="probootstrap-form mb-5">
                        <legend class="text-center"><h1>Contact</h1></legend>
                        <div class="form-group">
                                    <label for="email">Sujet / Objet</label>
                                    <input type="sujet" class="form-control" id="sujet" name="sujet" required>
                                </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
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
include 'footer.php';
?>