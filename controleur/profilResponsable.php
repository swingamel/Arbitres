<?php
include "modele/bd.authentification.php";
include "modele/bd.equipes.php";

if (isLoggedOnResponsable()) {
    $mailU = getMailULoggedOnResponsable();
    $util = getResponsableByMailU($mailU);
}
include "vue/entete.html.php";
include "vue/vueProfilResponsable.php";
include "vue/pied.html.php";
?>
