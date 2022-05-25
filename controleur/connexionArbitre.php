<?php
include_once "modele/bd.authentification.php";
//echo "connexion";
// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])) {
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "vue/entete.html.php";
    include "vue/vueAuthentificationArbitre.php";
    include "vue/pied.html.php";
} else {
//echo "else";
    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];

    loginArbitre($mailU, $mdpU);

    if (isLoggedOnArbitre()) {
        $titre = "confirmation";
        include "vue/vueHello.php";
    } else {
        $titre = "authentification";
        include "vue/entete.html.php";
        include "vue/vueAuthentificationArbitre.php";
        include "vue/pied.html.php";
    }
}
