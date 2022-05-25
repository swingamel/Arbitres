<?php

include "bd.inc.php";

function getArbitre()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT nom_arbitre, prenom_arbitre, date_naiss_arbitre, adresse_arbitre, CP_arbitre, ville_arbitre, tel_fixe_arbitre, tel_port_arbitre, mailU, nom_club from arbitre inner join club on arbitre.num_club = club.num_club");

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>