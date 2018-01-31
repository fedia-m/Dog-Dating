<?php
/**
 * Created by PhpStorm.
 * User: mahatehotia
 * Date: 31/01/18
 * Time: 08:47
 */
require_once '../config.php';
require_once '../connexion_bdd.php';
require_once '../classes/chien.php';



if ($_GET['deleteDog'] == true){
    echo 'youpi delete';
}

if ($_GET['editDog'] == true){
    echo 'youpi edit';
}
