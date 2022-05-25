<?php

include "bd.inc.php";

//ARBITRE

function loginArbitre($mailU, $mdpU)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getArbitreByMailU($mailU);
    $mdpBD = $util["mdpU"];
    //print_r($util);
    //echo "mdpU=".$mdpU."==";
    //echo "pass=".password_hash($mdpU, PASSWORD_BCRYPT);
    //echo "long=".strlen(password_hash($mdpU, PASSWORD_BCRYPT));
    
    if (password_verify($mdpU, $mdpBD)) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mailU"] = $mailU;
        $_SESSION["mdpU"] = $mdpBD;
    }
}

function logoutArbitre()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpU"]);
}

function getMailULoggedOnArbitre()
{
    if (isLoggedOnArbitre()) {
        $ret = $_SESSION["mailU"];
    } else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOnArbitre()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailU"])) {
        $util = getArbitreByMailU($_SESSION["mailU"]);
        if (
            $util["mailU"] == $_SESSION["mailU"] && $util["mdpU"] == $_SESSION["mdpU"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

function getArbitreByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select nom_arbitre, prenom_arbitre, adresse_arbitre, CP_arbitre, ville_arbitre, date_naiss_arbitre, tel_fixe_arbitre, tel_port_arbitre, mailU, nom_club, mdpU
        from arbitre inner join club on arbitre.num_club = club.num_club where mailU = :mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertArbitre(
    $nomArbitre,
    $prenomArbitre,
    $adrArbitre,
    $cpArbitre,
    $villeArbitre,
    $datenaissArbitre,
    $telfixeArbitre,
    $telportArbitre,
    $mailU,
    $numClub,
    $numEquipe,
    $mdpU
) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO arbitre VALUES (NULL, :nomArbitre, :prenomArbitre, :adrArbitre, :cpArbitre, :villeArbitre,
                            :datenaissArbitre, :telfixeArbitre, :telportArbitre, :mailU, :numClub, :numEquipe, :mdpU)");
        $req->execute(array(
            'nomArbitre' => $nomArbitre,
            'prenomArbitre' => $prenomArbitre,
            'adrArbitre' => $adrArbitre,
            'cpArbitre' => $cpArbitre,
            'villeArbitre' => $villeArbitre,
            'datenaissArbitre' => $datenaissArbitre,
            'telfixeArbitre' => $telfixeArbitre,
            'telportArbitre' => $telportArbitre,
            'mailU' => $mailU,
            'numClub' => $numClub,
            'numEquipe' => $numEquipe,
            'mdpU' => $mdpU
        ));
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
//RESPONSABLE

function loginResponsable($mailU, $mdpU)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getResponsableByMailU($mailU);
    $mdpBD = $util["mdpU"];

    if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mailU"] = $mailU;
        $_SESSION["mdpU"] = $mdpBD;
    }
}

function logoutResponsable()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpU"]);
}

function getMailULoggedOnResponsable()
{
    if (isLoggedOnResponsable()) {
        $ret = $_SESSION["mailU"];
    } else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOnResponsable()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailU"])) {
        $util = getResponsableByMailU($_SESSION["mailU"]);
        if (
            $util["mailU"] == $_SESSION["mailU"] && $util["mdpU"] == $_SESSION["mdpU"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}
function getResponsableByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select *
                            from responsable
                            where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertResponsable($mailResponsable, $mdpResponsable
) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO responsable VALUES (NULL, :mailResponsable, :mdpResponsable)");
        $req->execute(array(
            'mailResponsable' => $mailResponsable,
            'mdpResponsable' => $mdpResponsable
        ));
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
