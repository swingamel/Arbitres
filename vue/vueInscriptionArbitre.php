<style type="text/css">
    @import url("css/hello.css");
</style>
<title>Inscription Arbitre</title>
<body>
    <form action="" method="post">
        <fieldset name="inscriptionarb">
            <h5>inscription arbitre</h5>
            <input type="text" name="nomArbitre" placeholder="Nom" required />
            <input type="text" name="prenomArbitre" placeholder="Prenom" required />
            <input type="text" name="adrArbitre" placeholder="Adresse" required /></br>
            <input type="text" name="cpArbitre" placeholder="Code Postal" required />
            <input type="text" name="villeArbitre" placeholder="Ville" required />
            <input type="date" name="datenaissArbitre" required /></br>
            <input type="tel" name="telfixeArbitre" placeholder="Téléphone fixe" required />
            <input type="tel" name="telportArbitre" placeholder="Téléphone portable" required /></br>
            <input type="email" name="mail_arbitre" placeholder="Email" required />
            <input type="password" name="motdepasseA" placeholder="Mot de passe" required />

            <select name="listeClub">
                <option> Choisir le club </option>
                <?php foreach ($Club as $UnClub) { ?>
                    <option value="<?php echo $UnClub->num_club; ?>"><?php echo $UnClub->nom_club; ?></option>
                <?php } ?>
            </select>
            <select name="listeEquipe">
                <option> Choisir l'équipe </option>
                <?php foreach ($Equipe as $UneEquipe) { ?>
                    <option value="<?php echo $UneEquipe->num_equipe; ?>"><?php echo $UneEquipe->nom_equipe; ?></option>
                <?php } ?>
            </select>

            <input type="submit" name="inscription" value="S'inscrire" />
            </br>
        </fieldset>
    </form>
</body>