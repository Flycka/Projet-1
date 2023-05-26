<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            margin: 18px 0;
            width: 100%;
            border-collapse: collapse;
        }
        table th,
        table td {
            text-align: left;
            padding: 6px;
        }
        table,
        th,
        td {
            border: 1px solid #000;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //fonction pour ajouter une ligne
            $(".add").click(function() {
                var oport = "<select name='port[]'><option value='1'>P1</option><option value='2'>P2</option><option value='3'>P3</option></select>";
                var oud = "<select name='ud[]'><option value='U'>Upload</option><option value='D'>Download</option></select>";
                var indeb = "<input type='number' id='subject' name='debut[]' maxlength='11' required/>"
                var infin = "<input type='number' id='subject' name='fin[]' maxlength='11' required/>"
                var ligne = "<tr><td><input type='checkbox' name='select[]'></td><td>" + oport + "</td><td>" + oud + "</td><td>" + indeb + "</td><td>" + infin + "</td></tr>";
//                var ligne = "<td><input type='checkbox' name='select'></td><td><select name='port'><option value='p1'>P1</option><option value='p2'>P2</option><option value='p3'>P3</option></select></td><td><select name='ud'><option value='U'>Upload</option><option value='D'>Download</option></select></td><td><input type='number' id='subject' name='p1' maxlength='11' required/></td><td><input type='number' id='subject' name='p1' maxlength='11' required/></td>";
                $("table.test").append(ligne);
            });
            //fonction pour supprimer les lignes cochés
            $(".delete").click(function() {
                $("table.test").find('input[name="select"]').each(function() {
                    if ($(this).is(":checked")) {
                        $(this).parents("table.test tr").remove();
                    }
                });
            });
        });  
    </script>
    <title>Interface 2 projet</title>
</head>
<body>

<?php

/* Serveur Michel
$HOST = "projet-slam.freeboxos.fr";
$DBNAME = "projet";
$DBUSER = "laetitia";
$PASSWORD = "chat";
*/

$HOST = "localhost";
$DBNAME = "projet";
$DBUSER = "root";
$PASSWORD = "";

// $idscenario = isset($_GET["idscenario"]) ? ($_GET["idscenario"]):($_POST["idscenario"]);
session_start();
          $idscenario = $_SESSION['idscenario'];
          if (!$idscenario){
            header("Location: inter1proj.php");
          exit();
          }
    try
    {
        $bdd = new PDO("mysql:host=$HOST;dbname=$DBNAME;charset=utf8", $DBUSER, $PASSWORD); // On se connecte à MySQL
    }

    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage()); // En cas d'erreur, on affiche un message et on arrête tout
    }
 
    $reponse = $bdd->query('SELECT * FROM params ORDER BY idparams');    // On récupère tout le contenu de la table scenerio

    // S'il y des données de postées
    if ($_SERVER['REQUEST_METHOD']=='POST') {

        // Récupération des variables et sécurisation des données
        $port = $_POST['port'];
        $ud = $_POST['ud'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
    for ($i = 0; $i < count($port); $i++) {
           $sql = "INSERT INTO params (scenario, port, type_flux, debut, fin) VALUES ('$idscenario', '$port[$i]', '$ud[$i]','$debut[$i]', '$fin[$i]')";
           header("Location: /edsa-projet/Choix.html");
        if (!$bdd->query($sql)){
            echo $sql;
        }    
        }

                
    
    
    }
?>

    <form method="post" action="inter2proj.php">
        <input type="hidden" name="idscenario" value="<?php echo $idscenario ?>">
        <table class="test">
                <tr>
                    <th colspan="1">Sélectionner</th>
                    <th colspan="1">Port</th>
                    <th colspan="1">Type flux</th>
                    <th colspan="1">Début</th>
                    <th colspan="1">Fin</th>
                </tr>
                <tr>
                    <td><input type="checkbox" name="select[]"></td>
                    <td>				    
                        <select name="port[]">
                            <option value="1">P1</option>
                            <option value="2">P2</option>
                            <option value="3">P3</option>
                        </select>
                    </td>
                    <td>
                        <select name="ud[]">
                            <option value="U">Upload</option>
                            <option value="D">Download</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="debut[]" required/>
                    </td>
                    <td>
                        <input type="number" name="fin[]" required/>
                    </td>
                </tr>
        </table>
        <input type="button" class="add" value="Ajouter une ligne">
        <button type="button" class="delete">Supprimer une ligne</button>  
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>