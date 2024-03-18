<?php
session_start();
include ("./backend/crud.php");
$crud = new Crud("127.0.0.1", "root", "", "acar");

if (!isset ($_SESSION['email'])) {
    header("location: ./login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/w3.css">
    <link rel="stylesheet" type="text/css" href="./css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./index.css">
    <title>Document</title>
</head>

<body>
    <?php require ("./navigation.php"); ?>
    <br>
    <div class="w3-auto">
        <h1 style="font-weight: bold">Good Evening, <span class="w3-text-purple">
                <?php echo $_SESSION["fullname"]; ?>
            </span>?</h1>
        <div class="w3-row-padding w3-stretch">
            <div class="w3-col l6">
                <div class="w3-row-padding">
                    <h3>Todays Schedule,</h3>
                    <?php

                    $fetch = $crud->fetch_data("select * from reminders");
                    foreach ($fetch as $row) {
                        ?>
                        <div class="w3-col l6">
                            <div class="w3-padding w3-purple w3-round-large" style="height: 150px">
                                <span class="w3-large">
                                    <?php echo $row["unit"] ?>
                                </span><br>
                                <span>
                                    <?php
                                    $unitC = $row["unit"];
                                    $fetch2 = $crud->fetch_data("select * from unitregistration where unitCode = '$unitC'");
                                    echo $fetch2[0]["unitName"];
                                    ?>
                                </span>
                                <p><small>
                                        <?php echo $row["venue"] . " " . $row["time"]; ?>
                                    </small></p>
                            </div>
                        </div>

                        <?php
                    }

                    ?>


                </div>
                <br>
                <div class="w3-padding">
                    <a href="manage.php" class="w3-button w3-purple w3-round">
                        Manage
                    </a>
                </div>


            </div>
        </div>

    </div>
    <!-- <i class="fa fa-home"></i> -->
</body>

</html>