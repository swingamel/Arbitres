<style type="text/css">
    @import url("css/hello.css");
</style>
<title>Connexion Arbitre</title>

<body>
    <fieldset name="authen">
        <div id="containere">
            <h4>Connexion Arbitre</h4>
            <form action="./?action=connexionA" method="POST">
                <input name="mailU" type="email" placeholder="Entrer l'email" required>
                </br></br>
                <input name="mdpU" type="password" placeholder="Entrer le mot de passe" required>
                </br></br>
                <input type="submit" name="connection" value="Se connecter" />
            </form>
        </div>
        <h6>Cliquez ici pour vous <a href='./?action=inscriptionA'>inscrire</a></h6>
    </fieldset>
</body>

</html>