<?php
// Vérifiez si le mois et l'année sont passés dans l'URL
$currentMonth = isset($_GET['month']) ? (int)$_GET['month'] : (int)date('n'); // mois courant
$currentYear = isset($_GET['year']) ? (int)$_GET['year'] : (int)date('Y'); // année courante
$date = new DateTime("$currentYear-$currentMonth-01");
$monthName = $date->format('F');

// Gestion de l'incrémentation ou de la décrémentation
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'addOne') {
        $currentMonth++;
        if ($currentMonth > 12) {
            $currentMonth = 1;
            $currentYear++;
        }
    } elseif ($_GET['action'] === 'lessOne') {
        $currentMonth--;
        if ($currentMonth < 1) {
            $currentMonth = 12;
            $currentYear--;
        }
    }
}

// Créez un objet DateTime pour le premier et le dernier jour du mois
$dateFirstDayOfMonth = new DateTime("$currentYear-$currentMonth-01");
$dateLastDayOfMonth = clone $dateFirstDayOfMonth;
$dateLastDayOfMonth->modify('last day of this month');

$dayFirstMonth = (int)$dateFirstDayOfMonth->format('N') % 7;
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
    <link rel="stylesheet" href="/views/style/calendar.css">
    <link rel="icon" href="data:,">
</head>
<body>
    <form method="get" style="display:inline;">
        <input type="hidden" name="month" value="<?php echo $currentMonth; ?>">
        <input type="hidden" name="year" value="<?php echo $currentYear; ?>">
        <button type="submit" name="action" value="lessOne">Moins un</button>
    </form>
    <p><?=$monthName?>
    <form method="get" style="display:inline;">
        <input type="hidden" name="month" value="<?php echo $currentMonth; ?>">
        <input type="hidden" name="year" value="<?php echo $currentYear; ?>">
        <button type="submit" name="action" value="addOne">Plus un</button>
    </form>

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
        for($i = 0; $i < $dayFirstMonth; $i++){
            echo "<th>vide</th>";
            $emptyDay++;
        }
        
        for($i = 1; $i <= $lastDayOfMonth; $i++){
            $currentDay = $dateFirstDayOfMonth->format("Y-M-" . $i);
            echo '<th id="' . $currentDay . '">' . $i . '</th>';
            if (($i + $emptyDay) % 7 === 0){
                echo '</tr><tr>';
            }
        }
        ?>
        </tr>
    </table>
    <script src="/views/script/calendar.js"></script>
</body>
<script>
    const reservedDays = <?php echo json_encode($data); ?>;
    localStorage.setItem('reservedDays', JSON.stringify(reservedDays));
</script>
</html>