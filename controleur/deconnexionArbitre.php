<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
}
include_once "modele/bd.authentification.php";

// récupération des données GET, POST, et SESSION
// appel des fonctions permettant de récupérer les données utiles a l'affichage 
session_start();

// Détruire la session.
logoutArbitre();
// traitement si nécessaire des données récupérées

// appel du script de vue qui permet de gérer l'affichage des données
$titre = "Deconnexion";
include "vue/vueHello.php";
