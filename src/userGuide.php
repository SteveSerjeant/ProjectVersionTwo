<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "dbconn.php";

?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Security Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    stylesheet for the username and password icons-->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">-->

</head>

<body>
<header>
    <?php
    include 'header.php';
    include 'navbar.php';
    ?>

</header>






</body>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>
