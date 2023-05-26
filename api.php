<?php 
 
 $idtest = $_GET["idtest"];

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


$requete = $bdd->prepare("SELECT * FROM detail_log WHERE detail_log.idtest=:idtest;");
$requete->execute([":idtest"=>$_GET["idtest"]]);
header("Content-type: application/json");
echo json_encode($requete->fetchAll(PDO::FETCH_ASSOC));

 ?>