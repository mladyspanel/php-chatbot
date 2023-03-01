<!DOCTYPE html>
<html>

  <head>
  <link rel="stylesheet" href="styles.css">
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="styles.css" type="text/css">
<title>Jiří Bot</title>
  </head>

<body class="telo">
  <h1> Chatuj s Jiřím botem! </h1>
  <p> pokud ti chybí nějaká odpověď, přidej ji <a href="novaotazka.php">zde</a>.</p>
  <div class ="blok">
    <div class="formulare">
      <form action="" method="get">
	    <input type="text" name="message" placeholder="Napište zprávu" required>
      <input type="submit" value="Odeslat"></p>
    </div>
  <div class="zpravy">
  <p class="Odpoved">
    Zdaros, co potřebuješ? </p>
  

<?php
include "dbfunkce.php";
include "dbconnect.php";

//chat
if (isset($_GET["message"]))
{
    if( (count($starezpravy)+count($stareotazky)) > 0)
    {
      for ($i=0;$i < count($starezpravy); $i++)
      {
        if (isset($stareotazky[$i]))
        {
          echo "<p class='Otazka'>" . $stareotazky[$i] . "</p>";
        }
        else
        {
        return;
        }
        if (isset($starezpravy[$i]))
        {
          echo "<p class='Odpoved'>" . $starezpravy[$i] . "</p>";
        }
        else
        {
        return;
        }
      }
    }
    $message = $_GET["message"];
    echo "<p class='Otazka'>" . $message . "</p>";
    array_push($stareotazky, $message);
    najdiOtazku($servername, $username, $password, $dbname, $tabulka, $message);
    
}



?>