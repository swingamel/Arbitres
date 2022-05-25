<style type="text/css">
    @import url("css/hello.css");
</style>
<title>Connexion Responsable</title>
<body>
    <fieldset name="authen">
        <div id="containere">
            <h4>Connexion Responsable</h4>
            <form action="./?action=connexionR" method="POST">
                <input name="mailU" type="email" placeholder="Entrer l'email" required>
                </br></br>
                <input name="mdpU" type="password" placeholder="Entrer le mot de passe" required>
                </br></br>
                <input type="submit" name="connection" value="Se connecter" />
            </form>
        </div>
        <h6>Cliquez ici pour vous <a href='./?action=inscriptionR'>inscrire</a></h6>
</body>

</html>