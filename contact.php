<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $telefoon = $_POST["telefoon"];
    $bedrijfsnaam = $_POST["bedrijfsnaam"];
    $bericht = $_POST["bericht"];

    // Stel het e-mailadres van de ontvanger in
    $ontvanger_email = "fano.pawiroredjo@gmail.com";


    // Onderwerp van de e-mail
    $onderwerp = "Nieuw formulier ingevuld door $naam";

    // Bericht dat naar de ontvanger wordt gestuurd
    $bericht_inhoud = "Naam: $naam\n";
    $bericht_inhoud .= "E-mail: $email\n";
    $bericht_inhoud .= "Telefoon: $telefoon\n";
    $bericht_inhoud .= "Bedrijfsnaam: $bedrijfsnaam\n";
    $bericht_inhoud .= "Bericht:\n$bericht\n";    

    // Stuur de e-mail
    mail($ontvanger_email, $onderwerp, $bericht_inhoud);

    // Doorsturen naar een bedankpagina
    header("Location: https://88895.stu.sd-lab.nl/portfolio/");
    exit();
}
?>
