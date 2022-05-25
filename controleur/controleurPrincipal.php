<?php

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "hello.php";
    $lesActions["equipes"] = "goequipes.php";
    $lesActions["inscriptionA"] = "inscriptionArbitre.php";
    $lesActions["connexionA"] = "connexionArbitre.php";
    $lesActions["deconnexionA"] = "deconnexionArbitre.php";
    $lesActions["inscriptionR"] = "inscriptionResponsable.php";
    $lesActions["connexionR"] = "connexionResponsable.php";
    $lesActions["deconnexionR"] = "deconnexionResponsable.php";
    $lesActions["profilA"] = "profilArbitre.php";
    $lesActions["profilR"] = "profilResponsable.php";
    $lesActions["pdf"] = "pdf.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
