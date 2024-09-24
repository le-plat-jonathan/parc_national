<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="optCalendar">
    <button id="btn-less"> < </button> <span id="actualMonth"> Mois actuel </span> <button id="btn-plus"> > </button>
    </div>
    <table id="calendar">
        <thead>
            <tr>
            <th scope="col">Dimanche</th>
            <th scope="col">Lundi</th>
            <th scope="col">Mardi</th>
            <th scope="col">Mercredi</th>
            <th scope="col">Jeudi</th>
            <th scope="col">Vendredi</th>
            <th scope="col">Samedi</th>
            </tr>
        </thead>
        <tbody id="body-calendar">

        </tbody>
    </table>

    <button type="submit" id="reserve">Reserver</button>
    <button id="chalet-1">Chalet-1</button>
    <button id="chalet-2">Chalet-2</button>
    <button id="chalet-3">Chalet-3</button>
    <script src="script/script.js"></script>
</body>
<script>
    const reservedDays = <?php echo json_encode($data); ?>;
    localStorage.setItem('reservedDays', JSON.stringify(reservedDays));
</script>
</html>