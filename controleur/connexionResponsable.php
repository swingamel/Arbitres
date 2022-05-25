<?php
include_once "modele/bd.authentification.php";

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])) {
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "vue/entete.html.php";
    include "vue/vueAuthentificationResponsable.php";
    include "vue/pied.html.php";
} else {

    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];

    loginResponsable($mailU, $mdpU);

    if (isLoggedOnResponsable()) {
        $titre = "confirmation";
        include "vue/vueHello.php";
    } else {
        $titre = "authentification";
        include "vue/entete.html.php";
        include "vue/vueAuthentificationResponsable.php";
        include "vue/pied.html.php";
    }
}
