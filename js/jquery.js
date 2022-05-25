//fonction verif des champs avant envoi
function verif_champs() {
    //pseudo
    var pseudo = document.getElementById('txtNomEquipe');
    if (pseudo.value == "") {
        alert("Vous devez saisir un nom déquipe !");
        pseudo.focus(); //on met le focus sur le champ concerné
        return false; // on sort de la fonction et on empeche le form d'etre envoyé
    }
    //si on est arrivé jusque là c'est qui n'y a pas d'erreur
    //donc on autorise l'envoi du form
    return true;

}