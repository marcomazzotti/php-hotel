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

$filtered_hotels = $hotels;

if (isset($_GET["parking"]) && $_GET["parking"] === "1") {
  $temp_hotels = [];
  foreach ($filtered_hotels as $hotel) {
    if ($hotel["parking"]) {
      $temp_hotels[] = $hotel;
    }
  }
  $filtered_hotels = $temp_hotels;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Hotel</title>
</head>

<body>
  <h1 class="text-center">Hotel</h1>
  <div class="container">

    <form action="index.php" method="GET">
      <label for="parking">Parcheggio</label>
      <select name="parking" id="parking" class="form-select">
        <option value="">Tutti</option>
        <option value="1">Si</option>
      </select>
      <button type="submit" class="btn btn-primary my-2">Filtra</button>
    </form>

    <table class="table table-striped">
      <thead class="text-center">
        <tr>
          <th>Nome</th>
          <th>Descrizione</th>
          <th>Parcheggio</th>
          <th>Voto</th>
          <th>Distanza dal centro</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($hotels as $hotel) { ?>
          <tr>
            <td><?php echo $hotel['name']; ?></td>
            <td><?php echo $hotel['description']; ?></td>
            <td><?php echo $hotel['parking'] ? "Si" : "No"; ?></td>
            <td><?php echo $hotel['vote']; ?></td>
            <td><?php echo $hotel['distance_to_center']; ?> km</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>