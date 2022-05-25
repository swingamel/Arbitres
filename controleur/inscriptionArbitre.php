<?php

include "modele/bd.authentification.php";
include "modele/bd.equipes.php";

$Equipe = getEquipe();
$Club = getClub();


if (isset($_POST['inscription'])) {
    $pass = $_POST['motdepasseA'];
    $hash = password_hash($pass, PASSWORD_BCRYPT);

    insertArbitre(
        $_POST['nomArbitre'],
        $_POST['prenomArbitre'],
        $_POST['adrArbitre'],
        $_POST['cpArbitre'],
        $_POST['villeArbitre'],
        $_POST['datenaissArbitre'],
        $_POST['telfixeArbitre'],
        $_POST['telportArbitre'],
        $_POST['mail_arbitre'],
        $_POST['listeClub'],
        $_POST['listeEquipe'],
        $hash
    );
    header('Location: ?action=connexionA');

} else {

    include "vue/entete.html.php";
    include "vue/vueInscriptionArbitre.php";
    include "vue/pied.html.php";
}