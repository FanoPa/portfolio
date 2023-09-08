<?php
$servername = "localhost";
$username = "fano";
$password = "fanodb123!";
$dbname = "fano_db";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM projecten";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>opdracht1_088895</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>


<body>
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-success">
    <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <img src="media/logo.jpeg" alt="" width="50px" height="50px">
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="index.html" class="nav-link text-white" aria-current="page">Home</a></li>
      <li class="nav-item"><a href="overmij.html" class="nav-link text-white" aria-current="page">Over mij</a></li>
      <li class="nav-item"><a href="contact.html" class="nav-link text-white" aria-current="page">Contact</a></li>
      <li class="nav-item"><a href="projecten.html" class="nav-link text-white" aria-current="page">Projecten</a></li>
      <li class="nav-item"><a href="media.html" class="nav-link text-white" aria-current="page">Media</a></li>
    </ul>
  </header>

  <?php
if ($result->num_rows > 0) {
    // Start een teller om de kaarten in sets van drie te groeperen
    $cardCount = 0;

    // Open de container met horizontale centrering
    echo '<div class="container mx-auto">';

    // Loop door de resultaten
    while ($row = $result->fetch_assoc()) {
        // Als de teller modulo 3 gelijk is aan 0, start dan een nieuwe rij
        if ($cardCount % 3 === 0) {
            echo '<div class="row">';
        }

        // Voeg de kaart toe
        echo '<div class="col">';
        echo '<div class="card" style="width: 18rem;">';
        echo '<img src="' . $row["afbeelding"] . '" class="card-img-top" alt="Zoo">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["titel"] . '</h5>';
        echo '<p class="card-text">' . $row["beschrijving"] . '</p>';
        echo '<a href="' . $row["link"] . '" class="btn btn-success">Bekijken</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Als de teller modulo 3 gelijk is aan 2, sluit dan de rij
        if ($cardCount % 3 === 2) {
            echo '</div>'; // Sluit de rij
        }

        // Verhoog de teller
        $cardCount++;
    }

    // Sluit eventueel de laatste rij als deze niet vol is
    if ($cardCount % 3 !== 0) {
        echo '</div>'; // Sluit de laatste rij
    }

    // Sluit de container
    echo '</div>';
} else {
    echo "0 results";
}
$conn->close();
?>
