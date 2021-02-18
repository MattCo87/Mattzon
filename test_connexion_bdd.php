<!DOCTYPE html>
<html>
    <head>
        <title>aMattzon</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  

        <?php
            $bdd = 'mattzon';
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            // Connexion à la base
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }
            
            // On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }

            // Fermeture de connexion
            $conn = null;
            if (!$conn): echo '<br>Connexion terminée'; endif
        ?>
    </body>
</html>