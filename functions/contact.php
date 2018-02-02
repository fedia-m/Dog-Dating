<?php

if (isset($_POST['btnEnvoyer'])){
//Déclaration variable
$sujet = $_POST['sujet'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$message = $_POST['message'];
    $to = 'abcde@voila.fr';
    /* En-têtes de l'e-mail */
    $headers = "From: $nom \r\n\r\n";

    /* Envoi de l'e-mail */
    mail($to, $sujet, $message, $headers);

}

