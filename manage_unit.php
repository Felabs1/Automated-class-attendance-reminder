<?php

session_start();
include("./backend/crud.php");
$crud = new Crud("127.0.0.1", "root", "", "acar");
$fetch = $crud->fetch_data("SELECT * FROM unitregistration");
// echo $_SESSION['phone'];


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
    <?php require("./navigation.php"); ?>
    <?php
    if (isset($_GET["unit_code"])) {
        ?>
            <form class="w3-auto" style="width: 30rem">
                <label for="">Unit Code</label>
                <input type="text" class="w3-input w3-border w3-round" value="<?php echo $_GET["unit_code"] ?>">
                <label for="">Unit Name</label>
                <input type="text" class="w3-input w3-border w3-round">
                <label for="">Course Code</label>
                <input type="text" class="w3-input w3-border w3-round">
                <button class="w3-button w3-border w3-round">Save</button>
            </form>
        <?php
    }
     ?>
    <div class="w3-auto" >
        
    <br>
    <br>
    <table class="w3-table w3-bordered">
            <tr>
                <th>unit code</th>
                <th>unit name</th>
                <th>course code</th>
                <th>action</th>

            </tr>
            <?php
            foreach($fetch as $row){
                ?>
                <tr>
                    <td><?php echo $row["unitCode"]; ?></td>
                    <td><?php echo $row["unitName"]; ?></td>
                    <td><?php echo $row["course"]; ?></td>
                    <td><a href="./manage_unit.php?unit_code=<?php echo $row['unitCode'] ?>" class="w3-button w3-padding-small w3-grey w3-round">Edit</a>&nbsp;<button class="w3-button w3-padding-small w3-red w3-round">Delete</button></td>
                </tr>

                <?php
            }
             ?>
            
        </table>

    </div>
    <script src="./javascript/app.js"></script>
</body>
</html>