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
    <div class="section-title text-center">
        <h1> Mes messages </h1>
    </div>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mx-auto">
            <div class="card-title text-center"><h2><i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Envoyés </h2></div>
                <?php
                for ($i=0 ; $i<count($messageEnvoyes) ; $i++){
                    ?>
                    <div class="card card-body bg-light">
                        <div class="banner-area">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4">
                                        <div class="card">
                                            <img class="card-img-top probootstrap-animate" src=
                                                <?php
                                                if ($infoChiens[$i]->getPhoto()==''){
                                                    echo "http://via.placeholder.com/100x100";
                                                } else {
                                                    echo BASE_URL?>images/<?php echo $messageEnvoyes[$i]->getIdDestinataire().'/dogs/'.$infoChiens[$i]->getPhoto();

                                                }?>>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6 col-sm-6">
                                        <div class="banner-content">
                                            <h1>Objet</h1> <?php echo $messageEnvoyes[$i]->getObjet();?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-1 col-sm-1">
                                        <a href="<?php echo BASE_URL?>views/edit_profil.php?idMessage=<?php echo $messageEnvoyes[$i]->getId()?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h2>Contenu</h2>
                                        <p>
                                            <?php echo $messageEnvoyes[$i]->getContenu();?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php
                }
                ?>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mx-auto">
            <div class="card-title text-center"><h2> <i class="fa fa-chevron-circle-down" aria-hidden="true"></i> Reçus </h2></div>
                <?php
                /*echo count($messageEnvoyes);*/
                for ($i=0 ; $i<count($messageRecus) ; $i++){
                    ?>
            <div class="card card-body bg-light">
                <div class="banner-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4">
                                <div class="card">
                                    <img class="card-img-top probootstrap-animate" src=
                                        <?php
                                        if ($infoChiensR[$i]->getPhoto()==''){
                                            echo "http://via.placeholder.com/100x100";
                                        } else {
                                        echo BASE_URL?>images/<?php echo $messageRecus[$i]->getIdDestinataire().'/dogs/'.$infoChiensR[$i]->getPhoto();

                                        }?>>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-6">
                                <div class="banner-content">
                                    <h1>Objet</h1> <?php echo $messageRecus[$i]->getObjet();?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-1 col-sm-1 -align-right">
                                <a href="<?php echo BASE_URL?>controllers/supprimer_message.php?idMessage=<?php echo $messageRecus[$i]->getId()?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h2>Contenu</h2>
                                <p>
                                    <?php echo $messageRecus[$i]->getContenu();?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <a href="#">
                                    <i class="fa fa-share-square"></i> Répondre
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
include "footer.php";

?>