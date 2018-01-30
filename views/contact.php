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
        <p class="mb-5"><img src="../images/img_bg_1.jpg" alt="Free Bootstrap 4 Template by ProBootstrap.com" class="img-fluid"></p>
        <div class="card card-body bg-light">
            <div class="row">
                <div class="col-xl-8 col-lg-12 mx-auto">
                    <form action="#" method="post" class="probootstrap-form mb-5">
                        <legend class="text-center"><h1>Contact</h1></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">Prénom</label>
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lname">Nom</label>
                                    <input type="text" class="form-control" id="lname" name="lname">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group mb-4">
                            <label for="message">Message</label>
                            <textarea cols="30" rows="10" class="form-control" id="message" name="message"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Envoyer">
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