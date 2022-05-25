<?php

    function getEquipe()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT num_equipe, nom_equipe, nom_club, nom_championnat from equipe
            inner join championnat on equipe.num_championnat = championnat.num_championnat
            inner join club on equipe.num_club = club.num_club");

            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    function getClub()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT * from club");

            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    function getChampionnat()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT num_championnat, nom_championnat from championnat");

            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    function insertEquipe($nomEquipe, $numClub, $numChamp)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("INSERT INTO equipe VALUES (NULL, :nomEquipe, :numClub, :numChampionnat)");
            $req->execute(array(
                'nomEquipe' => $nomEquipe,
                'numClub' => $numClub,
                'numChampionnat' => $numChamp
            ));
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    function getEquipeByNum($numEquipe)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("SELECT num_equipe, nom_equipe, equipe.num_club, nom_club, equipe.num_championnat, nom_championnat from equipe
            inner join championnat on equipe.num_championnat = championnat.num_championnat
            inner join club on equipe.num_club = club.num_club WHERE num_equipe = :numEquipe");
            $req->bindValue(':numEquipe', $numEquipe, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    function updateEquipe($numEquipe, $nomEquipe, $numClub, $numChampionnat)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("UPDATE equipe
                                  SET nom_equipe = ?, num_club = ?, num_championnat = ?
                                  WHERE num_equipe = ?");
            $req->bindValue(1, $nomEquipe);
            $req->bindValue(2, $numClub);
            $req->bindValue(3, $numChampionnat);
            $req->bindValue(4, $numEquipe);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    function deleteEquipe($numEquipe)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("DELETE FROM equipe
                                WHERE num_equipe = ?");
            $req->bindValue(1, $numEquipe);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }