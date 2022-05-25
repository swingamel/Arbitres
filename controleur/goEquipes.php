<?php
include "./modele/bd.equipes.php";
include_once "modele/bd.authentification.php";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST['valider'])) {
    insertEquipe($_POST['txtNomEquipe'], $_POST['listeclub'], $_POST['listechamp']);
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$Equipe = getEquipe();
$Club = getClub();
$Championnat = getChampionnat();

if (isset($_POST['modifier'])) {
    $numEquipe = $_POST['equipe'];
    $afficher = getEquipeByNum($numEquipe);
}
if (isset($_POST['modif'])) {
    $numEquipe = $_POST['numEquipe'];
    $nomEquipe = $_POST['txtNomEquipe'];
    $numClub = $_POST['listeclub'];
    $numChampionnat = $_POST['listechamp'];
    updateEquipe($numEquipe, $nomEquipe, $numClub, $numChampionnat);

    header('Location: ?action=equipes');
}
if(isset($_POST['supprimer'])){
    $numEquipe = $_POST['numEquipe'];
    deleteEquipe($numEquipe);

    header('Location: ?action=equipes');
}
// traitement si necessaire des donnees recuperees

include "./vue/entete.html.php";
include "./vue/vueEquipes.php";
include "./vue/pied.html.php";
