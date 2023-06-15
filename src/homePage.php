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

    <link rel="stylesheet" href="../css/outputTable.css" type="text/css">

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">

    <!--    stylesheet for the username and password icons-->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">-->



</head>

<body style="min-height: 100vh">
<header>
    <?php
    include 'header.php';
    include 'navbar.php';
    ?>
</header>

<article>

    <section>

        <div class = "wrapper3">
            <div class="container-fluid">

                <div class = "row">
                    <table class = "outputTable" id="output" style="width: 85%; height: 20%; text-align: center">
                        <colgroup>
                            <col span="1" style="width: 8%">
                            <col span="1" style="width: 8%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 5%">
                            <col span="1" style="width: 5%">
                        </colgroup>

                        <tr bgcolor="#afeeee" style="text-align: center">
                            <th class="moreInfo" style='text-align: center'>Host Name
                                <span class="tooltip">This is the device hostname, found in the about your PC section</span></th>
                            <th class="moreInfo" style='text-align: center'>IP Address
                                <span class="tooltip">This is the unique internal "address" for this device on this network</span></th>
                            <th  class="moreInfo" style='text-align: center'>MAC Address
                                <span class="tooltip">This is a unique identifier for this device</span></th>
                            <th class="moreInfo" style='text-align: center'>When Added
                                <span class="tooltip">This is the date when this device was found by scanning and added to the database</span></th>
                            <th class="moreInfo" style='text-align: center'>Notes
                                <span class="tooltip">User added notes about the device</span></th>
                            <th class="moreInfo" style='text-align: center'>Add Notes
                                <span class="tooltip">Clicking on the link gives the user the option to add the notes</span></th>
                            <th class="moreInfo" style='text-align: center'>Port List
                                <span class="tooltip">Click on the link to display port and services running for each device on the network</span></th>
                        </tr>


                        <?php

                        $sql = 'CALL getDevices()';

                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center' >" . $row['hostName'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['ipAddress'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['macAddress'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['scanTimestamp'] . "</td>";
                            echo "<td style='text-align: left'>" . $row['notes'] . "</td>";
                            echo "<td bgcolor='#6495ed' style='text-align: center'><a href='addNotes.php?id=$row[ipAddress]'><font color='white'>Add Notes</font> </a>";
//
//                            echo "<td><button type='button' class='passID' data-bs-toggle='modal' data-bs-target='#addNotes.php' data-id='$row[ipAddress]' >Add Notes</button></td>";
//                            echo "<td><button type='button' class='passID' data-bs-toggle='modal' data-bs-target='#addNotesModal' data-id='$row[ipAddress]' >Add Notes</button></td>";
                            echo "<td><a href='portList.php?id=$row[ipAddress]'>Port List</a>";
                            echo "</tr>";
                        }
                        $stmt->close();
                        mysqli_close($con);
                        ?>

                    </table>

                </div>

            </div>
        </div>





    </section>
</article>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>


</body>


</html>


