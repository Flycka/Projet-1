<?php


$HOST = "localhost";
$DBNAME = "projet";
$DBUSER = "root";
$PASSWORD = "";


    try
    {
        $bdd = new PDO("mysql:host=$HOST;dbname=$DBNAME;charset=utf8", $DBUSER, $PASSWORD); // On se connecte à MySQL
    }
 
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
    }
 
    // Si tout va bien, on peut continuer
    // On récupère tout le contenu de la table scenerio
    $reponse = $bdd->query('SELECT * FROM scenario ORDER BY idscenario');
 
 while ( $ligne = $reponse->fetch()) {
   
    echo '<a href="/edsa-projet/routetest.php/?idscenario='. $ligne["idscenario"] . ' " >'. $ligne["nom"] . '</a> <br>';
 }

    ?>

<style>
        a.leBouton {
        margin: 20%;    
        text-decoration: none;
        padding: 10px 30px;
        background-color: #181b3c; 
        color: white;
        border: 1px solid gray;
        border-style:inset;
        }
        a.leBouton2
        {
        border-radius: 12px;
        border: 2px solid #46a28d;
        }
        a.leBouton:hover {
        background-color: #17a589;
        color:white;
        }
    </style>
<a href="/edsa-projet/Choix.html" class="leBouton leBouton2">Retour</a>