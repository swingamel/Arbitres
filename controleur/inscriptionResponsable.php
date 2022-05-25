<?php
// Chargement des fichiers modèles fonctions enregistrement_membre($pseudo, $pass_hash, $email) et check_bdd($pseudo)
include "modele/bd.authentification.php";
include "modele/bd.equipes.php";


if (isset($_POST['inscription'])) {
    $pass = $_POST['motdepasse'];
    $hash = password_hash($pass, PASSWORD_BCRYPT);
    
    insertResponsable(
        $_POST['mail_responsable'],
        $hash
    );
    header('Location: ?action=connexionR');
    // On rend inoffensif les données de l'utilisateur
} else {

    include "vue/entete.html.php";
    include "vue/vueInscriptionResponsable.php";
    include "vue/pied.html.php";
}