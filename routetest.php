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
 
$requete = $bdd->prepare("select * from test where scenario = :idscenario");
$requete->execute([":idscenario"=>$_GET["idscenario"]]);

if ($requete->rowCount()===0){
    echo "Il n'y a pas encore de test pour ce scenario.";
    ?><a href="/edsa-projet/chxscenario.php" class="leBouton leBouton2">Retour</a> <?php
    die;
}

while ( $ligne = $requete->fetch()) {

    echo '<a href="/edsa-projet/graph.html?idtest='. $ligne["idtest"] . ' " >'. $ligne["nom"] . " " . $ligne["ts_debut"] . '</a> <br>';
    ?><a href="/edsa-projet/chxscenario.php" class="leBouton leBouton2">Retour</a> <?php
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