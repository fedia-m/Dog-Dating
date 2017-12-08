<?php
require("config.php");
require("connexion_bdd.php");
include("views/header.php");
include("views/menu.php");
include("views/accueil.php");
include("views/footer.php");


$mdpayhann='ayhanncesi';
$mdptiona='tionacesi';
$mdpfadia='fadiacesi';

var_dump(sha1(sha1($mdpayhann)));
var_dump(sha1(sha1($mdptiona)));
var_dump(sha1(sha1($mdpfadia)));
var_dump(sha1(sha1("invitecesi")));