<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    
    <style type="text/css">
        @import url("css/hello.css");
    </style>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>

<body>

    <body>
        <nav>
            <ul class="menu">
                <a href="./?action=defaut">ACCUEIL</a>
                <a href="./?action=equipes">EQUIPES</a>
                <?php if (isLoggedOnResponsable()) {
                ?>
                    <li><a href="#">PROFIL Responsable</a>
                        <ul name=responsable>
                            <a name=menuresponsable1 href="./?action=profilR">Mes informations</a>
                            <a name=menuresponsable2 href="./?action=deconnexionR">DECONNEXION</a>
                        </ul>
                    </li>
                <?php } elseif (isLoggedOnArbitre()) {
                ?>
                    <li><a href="#">PROFIL Arbitre</a>
                        <ul name=arbitre>
                            <a name=menuarbitre1 href="./?action=profilA">Mes informations</a>
                            <a name=menuarbitre2 href="./?action=deconnexionA">DECONNEXION</a>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href="#">CONNEXION</a>
                        <ul name=connexion>
                            <a name=menuconnexion1 href="./?action=connexionA">Arbitre</a>
                            <a name=menuconnexion2 href="./?action=connexionR">Responsable</a>
                        </ul>
                    </li>
                <?php }
                ?>
            </ul>
        </nav>
    </body>

</html>