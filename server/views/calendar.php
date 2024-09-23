<?php

$dateFirstDayOfMonth = new DateTime('first day of this month');
$dateLastDayOfMonth = new DateTime('last day of this month');

// Modifier pour que le dimanche soit représenté par 0
$dayFirstMonth = $dateFirstDayOfMonth->format('N') % 7;

$lastDayOfMonth = $dateLastDayOfMonth->format('d');

$emptyDay = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Dim</th>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mer</th>
            <th>Jeu</th>
            <th>Ven</th>
            <th>Sam</th>
        </tr>
        <tr>
        <?php 
        // Ajouter les jours vides au début du calendrier
        for($i = 0; $i < $dayFirstMonth; $i++){
            echo "<th>vide</th>";
            $emptyDay++;
        }
        
        // Afficher les jours du mois
        for($i = 1 ; $i <= $lastDayOfMonth ; $i++){
            echo "<th>" . $i ."</th>";
            
            // Créer une nouvelle ligne chaque fois que la semaine est complète
            if (($i + $emptyDay) % 7 === 0){
                echo '</tr><tr>';
            } 
        }
        ?>
        </tr>
    </table>

    <?php 
    echo '<pre>';
    echo ('Date premier jour du mois' . '</br></br>');
    var_dump($dateFirstDayOfMonth);
    echo ('Date dernier jour du mois'. '</br></br>');
    var_dump($dateLastDayOfMonth);
    echo ('Premier jour du mois index semaine'. '</br></br>');
    var_dump($dayFirstMonth);
    echo ('Dernier jour du mois'. '</br></br>');
    var_dump($lastDayOfMonth);
    echo '</pre>'
    ?>
</body>
</html>