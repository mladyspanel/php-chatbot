<!DOCTYPE html>
<html>
  <head>
  
  <link rel="stylesheet" href="styles.css">
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="styles.css" type="text/css">
<title>Jiří Bot - nova otazka</title>
  </head>

<body class="telo">

  <div class="blok2">
    <form action="" method="get">
	    <input type="text" name="notazka" placeholder="Napište otázku" required>
      <input type="text" name="nodpoved" placeholder="Napište odpověď" required><br>
      <input type="submit" value="Odeslat">
  </div>


</body>




<?php
include "dbfunkce.php";
include "dbconnect.php";

//nová otázka
if (isset($_GET["notazka"]))
{
    $notazka = $_GET["notazka"];
}
if (isset($_GET["nodpoved"]))
{
    $nodpoved = $_GET["nodpoved"];
}

if (isset($_GET["notazka"]) and isset($_GET["nodpoved"]))
{
  pridejOtazku($servername, $username, $password, $dbname, $tabulka, $notazka, $nodpoved);
}
