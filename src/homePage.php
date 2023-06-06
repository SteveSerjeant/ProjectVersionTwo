<!DOCTYPE html>
<html lang="en">

<?php

include_once ("dbconn.php");

session_start();

//check if user is logged in, if not re-direct to index.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;
}


?>
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">


</head>

<body>

<header>
    <?php include 'header.php'?>
</header>

<nav>
    <div class="wrapper3">
        <?php include 'navbar.php'?>

    </div>
</nav>

Hello World!

</body>


</html>


