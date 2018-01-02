<?php
require_once 'config.php';
include("views/header.php");
include("views/menu.php");
include("views/accueil.php");
include("views/footer.php");
require_once 'classes/adherent.php';

$mdpayhann='ayhanncesi';
$mdptiona='tionacesi';
$mdpfadia='fadiacesi';

//var_dump(sha1(sha1($mdpayhann)));
//var_dump(sha1(sha1($mdptiona)));
//var_dump(sha1(sha1($mdpfadia)));
//var_dump(sha1(sha1("invitecesi")));


$oAdh = Adherents::getInstance($bdd);
$ocolladh = $oAdh->getCollection();
$nbadh = count($ocolladh);
echo $nbadh;