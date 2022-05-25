<?php
include "modele/bd.authentification.php";
include "modele/bd.equipes.php";

if (isLoggedOnArbitre()) {
    $mailU = getMailULoggedOnArbitre();
    $util = getArbitreByMailU($mailU);
}
include "vue/entete.html.php";
include "vue/vueProfilArbitre.php";
include "vue/pied.html.php";
?>
