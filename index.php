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

$vote = isset($_POST['vote']) ? $_POST['vote'] : 0;

if (!isset($_POST['parking'])) {
  foreach ($hotels as $hotel) {
    if ($hotel['parking'] && $hotel['vote'] >= $vote) {
      $filtered_hotels[] = $hotel;
    }
  }
}

// var_dump($hotels);

var_dump($_POST);

if (!isset($_POST['parking'])) {
  $filtered_hotels = $hotels;
} else {
  foreach ($hotels as $hotel) {
    if ($hotel['parking']) {
      $filtered_hotels[] = $hotel;
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Php Hotel</title>
</head>

<body class="bg-secondary">
  <div class="container my-5">
    <h1 class="text-center">Php Hotel</h1>

    <form action="index.php" method="$_POST">
      <div class="m-3 d-flex align-items-center">
        <div class="px-2">
          <input class="form-check-input" type="checkbox" id="parking">
          <label class="form-check-label" for="parking">
            Solo con Parcheggio
          </label>
        </div>

        <?php for ($i = 0; $i <= 5; $i++) :  ?>
          <div class="mx-2">
            <input type="radio" class="form-check-input" name="vote" id="vote<?php echo $i ?>" value="<?php echo $i ?>">
            <label for="vote<?php echo $i ?>" class="form-check-label"> <?php echo $i ?> </label>
          </div>
        <?php endfor ?>

        <button class="btn btn-success">Filter</button>
      </div>
    </form>

    <div class="d-flex">
      <?php foreach ($hotels as $hotel) : ?>
        <div class="card m-3 bg-primary-subtle" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $hotel['name'] ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">
              <?php echo $hotel['description'] ?>
            </h6>
            <hr>
            <p class="card-text">Parcheggio: <?php echo $hotel['parking'] ? 'Yes' : 'No' ?></p>
            <p class="card-text">Voto: <?php echo $hotel['vote'] ?></p>
            <p class="card-text">Distanza dal centro: <?php echo $hotel['distance_to_center'] ?> Km</p>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</body>

</html>