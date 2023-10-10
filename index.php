<?php

/* Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
 Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. */


$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];



//echo boolval('') ? 'true' : 'false';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHotelP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <form action="" method="GET" class="d-flex">
            <select class="form-select w-50" name="parking" id="parking">
                <option value="" selected='selected' hidden='hidden' disabled='disabled'>Parcheggio</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
            <button class="btn btn-primary" type="submit">Filtra</button>
            <a class="btn btn-danger" href="./index.php">Refresh Page</a>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Decription</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance</th>
                </tr>
            </thead>
            <tbody>
                <?php //var_dump($_GET['parking']) ?>
                

                <?php //echo !isset($_GET['parking']) ?>
                <?php foreach ($hotels as $hotel): ?>
                    <?php //echo "<br><br>". 'SETTATO: ' . isset($_GET['parking'])."<br><br>" . 'PARCHEGGIO_HOTEL: ' . !$hotel['parking'] ."<br><br>"  . 'FILTRO_PARCHEGGIO: ' . boolval($_GET['parking'])."<br><br>"; ?>
                <?php if (isset($_GET['parking']) && $hotel['parking'] && $_GET['parking']): ?>
                    
                    <tr>
                    <td><?= $hotel['name'] ?></td>
                    <td><?= $hotel['description'] ?></td>
                    <td><?php if ($hotel['parking']) {
                            echo '✔';
                        } else {
                            echo '❌';
                        } ?></td>
                    <td><?= $hotel['vote'] ?></td>
                    <td><?= $hotel['distance_to_center'] ?> km</td>
                </tr>
                <?php elseif (isset($_GET['parking']) && !$hotel['parking'] && !$_GET['parking']): ?>
                    
                    <tr>
                    <td><?= $hotel['name'] ?></td>
                    <td><?= $hotel['description'] ?></td>
                    <td><?php if ($hotel['parking']) {
                            echo '✔';
                        } else {
                            echo '❌';
                        } ?></td>
                    <td><?= $hotel['vote'] ?></td>
                    <td><?= $hotel['distance_to_center'] ?> km</td>
                </tr>
                <?php elseif (!isset($_GET['parking'])): ?>
                    
                    <tr>
                    <td><?= $hotel['name'] ?></td>
                    <td><?= $hotel['description'] ?></td>
                    <td><?php if ($hotel['parking']) {
                            echo '✔';
                        } else {
                            echo '❌';
                        } ?></td>
                    <td><?= $hotel['vote'] ?></td>
                    <td><?= $hotel['distance_to_center'] ?> km</td>
                </tr>

                <?php endif; endforeach; ?>
            </tbody>
        </table>
    </div>


</body>

</html>