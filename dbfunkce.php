<?php
include "dbconnect.php";
include "id.php";

//Hodnoty pro funkce
$tabulka = "pokyny";
$sloupec1 = "id";
$sloupec2 = "otazka";
$sloupec3 = "odpoved";

$stareotazky = [];
$starezpravy = [];

//pripojeni k databazi
function PripojDB($servername, $username, $password, $dbname)
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Spojení s databází se nezdařilo: " . $conn->connect_error);
    }
    return $conn;
}


//vyhledani otazky
function najdiOtazku($servername, $username, $password, $dbname, $tabulka, $message)
{
    $conn = PripojDB($servername, $username, $password, $dbname);
    $vyhledani = "SELECT odpoved FROM `pokyny` WHERE otazka = '$message' LIMIT 1";
    $result = $conn->query($vyhledani);
    while($row = $result->fetch_assoc()) 
        {
            echo "<p class ='Odpoved'> " . $row["odpoved"] . "</p>";
            array_push($starezpravy, $row["odpoved"]);
        }
}


//pridani otazky
function pridejOtazku($servername, $username, $password, $dbname, $tabulka, $notazka, $nodpoved)
{
    $conn = PripojDB($servername, $username, $password, $dbname);
    $pridat = "INSERT INTO `pokyny` (otazka, odpoved) VALUES ('$notazka', '$nodpoved')";
    $result = $conn->query($pridat);
    $conn->close();
}








?>