<?php 

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

    $filters_hotel = $hotels;

    //filter con parcheggio
    if(!empty($_GET['parking'])){
        $parking = $_GET['parking'] === 'yes' ? true : false;

        $temp_hotels = [];
        foreach($filters_hotel as $hotel) {
            if($hotel['parking'] === $parking) {
                $temp_hotels[] = $hotel;
            }
        }
        $filters_hotel = $temp_hotels;
    }

?>

<!DOCTYPE html>
<html lang="it-IT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- personal style  -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="display-1 fw-bold d-flex justify-content-center py-4">Hotels</h1>

        <!-- form per filtrare gli hotel in base al parcheggio -->
        <form action="index.php" method="GET">
            <div class="row g-3 pb-3 align-items-center d-flex justify-content-center">
                <!-- checkbox per selezionare "con parcheggio" -->
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="parkingYes" value="yes" <?php if (!empty($_GET['parking']) && $_GET['parking'] === 'yes') echo 'checked'; ?>>
                        <label class="form-check-label" for="parkingYes">Con parcheggio</label>
                    </div>
                </div>
                <!-- checkbox per selezionare "senza parcheggio" -->
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="parkingNo" value="no" <?php if (!empty($_GET['parking']) && $_GET['parking'] === 'no') echo 'checked'; ?>>
                        <label class="form-check-label" for="parkingNo">Senza parcheggio</label>
                    </div>
                </div>
                <!-- bottone di submit -->
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Cerca</button>
                </div>
            </div>
        </form>
        <!-- fine form per filtrare gli hotel in base al parcheggio -->
    
        <!-- stampa dati di tutti gli hotel in tabella -->
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Desscrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
            <!-- ciclo foreach per ciclare sugli hotel presenti -->
            <?php foreach ($hotels as $hotel) :?>
                <tr>
                    <td><?php echo $hotel['name']; ?></th>
                    <td><?php echo $hotel['description']; ?></td>
                    <!-- trasformiamo il "tru o false" del parcheggio in "si o no" -->
                    <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel ['distance_to_center']; ?> km</td>
                </tr>
            <!-- fine del ciclo foreach per ciclare sugli hotel presenti -->
            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- fine stampa dati di tutti gli hotel in tabella -->
        
        <h2 class="display-1 fw-bold d-flex justify-content-center py-4">Hotels filtrati</h2>

        <!--stampa dati degli hotel filtrati in tabella-->
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance_to_center</th>
                </tr>
            </thead>
            <tbody>
            <!-- ciclo foreach per ciclare sugli hotel filtrati -->
            <?php foreach ($filters_hotel as $hotel) :?>
                <tr>
                    <td><?php echo $hotel['name']; ?></th>
                    <td><?php echo $hotel['description']; ?></td>
                    <!-- trasformiamo il "tru o false" del parcheggio in "si o no" -->
                    <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel ['distance_to_center']; ?>km</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!--fine stampa dati degli hotel filtrati in tabella-->
    </div>

<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>