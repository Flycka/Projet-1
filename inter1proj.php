<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      /* -------- CONTACT -------- */
      .inter1 {
        display: flex;
        flex-flow: column wrap;
        color: white;
        box-sizing : border-box;
        border-radius: 20px;
        background-color: #181b3c;
        padding:20px;
        width: 100%;
        max-width: 440px;
        margin:0 auto;
        }

      .port{
        padding: 1.2em;
        display: flex;
        flex-flow: column wrap;
        border: 1.5px dotted white;
      }

      input[type=text], textarea, input[type=email] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        margin-right: 0px;
        margin-left: 0px;
        resize: vertical;
      }
      label{margin-right: 0px;
        margin-left: 0px;
        width: 100%;}
      
      input[type=submit] {
        background-color: #17A589;
        color: white;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
      }
      
      input[type=submit]:hover {
        border-color: #ffffff;
      }

      a.leBouton {
        text-align: center;
        width: 5em;
        margin-top: 2em;
        text-decoration: none;
        padding: 10px 30px;
        background-color: #17a589; 
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
    <title>Interface 1 projet</title>
</head>
<body>

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
    $reponse = $bdd->query('SELECT * FROM scenerio ORDER BY idscenario');

    // S'il y des données de postées
    if ($_SERVER['REQUEST_METHOD']=='POST') {

      // Récupération des variables et sécurisation des données
      $nom = isset($_POST['nom']) ? htmlentities($_POST['nom']) : ""; // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
      $intervalle = htmlentities($_POST['intervalle']);
      $p1 = htmlentities($_POST['p1']);
      $p2 = htmlentities($_POST['p2']);
      $p3 = htmlentities($_POST['p3']);

      $requete1 = "INSERT INTO scenario (nom, intervalle) VALUES ( '$nom','$intervalle')"; 
      if($bdd->query("$requete1")) { //Si la requete s'execute correctement
          $idscenario = $bdd->lastInsertId();
          $bdd->query("INSERT INTO port_scenario (port, scenario, numport) VALUES ( 1,'$idscenario','$p1')");
          $bdd->query("INSERT INTO port_scenario (port, scenario, numport) VALUES ( 2,'$idscenario','$p2')");
          $bdd->query("INSERT INTO port_scenario (port, scenario, numport) VALUES ( 3,'$idscenario','$p3')");
          session_start();
          $_SESSION['idscenario'] = $idscenario;
          //Redirige vers la page de parametrage
          header("Location: /edsa-projet/inter2proj.php");
          exit();
      } else {
          echo 'bad';
      }
    }
    ?>

    <div class="inter1">
        <form method="post" action="">
            <label>Nom de scénario</label>
            <input type="text" name="nom" placeholder="Nom de scénario" maxlength="11" required/>
        
            <label>Intervalle</label>
            <input type="number" name="intervalle" placeholder="Intervalle" required/>

            <div class="port">
              <label>P1</label>
              <input type="number" id="subject" name="p1" maxlength="11" required/>
          
              <label>P2</label>
              <input type="number" id="subject" name="p2" maxlength="11" required>
          
              <label>P3</label>
              <input type="number" id="subject" name="p3" maxlength="11" required>
            </div>
            <input type="submit" value="Envoyer">
        </form>
        <a href="/edsa-projet/Choix.html" class="leBouton leBouton2">Retour</a>
    </div>


</body>
</html>