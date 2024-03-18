<?php
session_start();
include ("./backend/crud.php");
$crud = new Crud("127.0.0.1", "root", "", "acar");
$fetch = $crud->fetch_data("SELECT * FROM reminders");
$fetch3 = $crud->fetch_data("SELECT * FROM unitregistration");
$course = $crud->fetch_data("SELECT * FROM courseregistration");
// echo $_SESSION['phone'];

if (!isset ($_SESSION["usertype"])) {
    header("location: ./index.php");
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
    <style>
        th,
        td {
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <?php
    if (isset ($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo "<script>alert('$msg')</script>";
    }
    ?>
    <?php require ("./navigation.php"); ?>
    <br>
    <div class="w3-auto">

        <?php
        if (isset ($_GET['reminder_id'])) {
            $course_code = $_GET['reminder_id'];
            $fetch2 = $crud->fetch_data("select * from reminders where reminder_id = '$course_code'");
            ?>
            <div class="w3-auto" style="width: 30rem">
                <form id="reminder" class="w3-white w3-padding w3-round-large">
                    <h3>create reminder</h3>
                    <hr>
                    <label for="">unit</label>
                    <select class="w3-input w3-border w3-round" name="unit" id="unit">
                        <?php
                        foreach ($fetch3 as $row2) {
                            ?>
                            <option value="<?php echo $row2['unitCode']; ?>">
                                <?php echo $row2["unitName"]; ?>
                            </option>
                            <?php
                        }

                        ?>
                    </select>
                    <label for="">time</label>
                    <input class="w3-input w3-border w3-round" type="time" value="<?php echo $fetch2[0]["time"]; ?>"
                        name="time" id="time" />
                    <label for="">venue</label>
                    <input class="w3-input w3-border w3-round" name="venue" value="<?php echo $fetch2[0]["venue"]; ?>"
                        id="venue" />
                    <label for="">group</label>
                    <select class="w3-select w3-border w3-round" value="<?php echo $fetch2[0]["group"]; ?>" name="group"
                        id="group">
                        <?php
                        foreach ($course as $row) {
                            ?>
                            <option value="<?php echo $row['courseCode']; ?>">
                                <?php echo $row['courseName']; ?>
                            </option>

                            <?php
                        }
                        ?>
                    </select>
                    <label for="">day of the week</label>
                    <select class="w3-select w3-border w3-round" id="day_of_the_week"
                        value="<?php echo $fetch2[0]["dayOfTheWeek"]; ?>" name="day_of_the_week">
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>
                    <!-- <label for="">lecturer id</label>
                    <input class="w3-input w3-border w3-round" name="unit_name" id="unit_name"/> -->
                    <br>
                    <br>
                    <button class="w3-button w3-purple w3-round" type="button" onclick="addReminder()">Add</button>
                </form>
            </div>
            <br>

            <?php
        }
        ?>

        <?php
        $fetch = $crud->fetch_data("select * from lecturers");
        ?>
        <table class="w3-table">
            <tr>
                <th>Name</th>
                <th>idNo</th>
                <th>email</th>
                <th>phoneNo</th>
                <th>Action</th>
            </tr>

            <?php
            foreach ($fetch as $row) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['Names']; ?>
                    </td>
                    <td>
                        <?php echo $row['idNo']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['phoneNo']; ?>
                    </td>
                    <td>
                        <a href="./backend/connection.php?deleteLecturer=<?php echo $row['email']; ?>"
                            class="w3-button w3-red w3-round">delete</a>
                    </td>
                </tr>
                <?php

            }

            ?>

        </table>
    </div>
    <!-- <i class="fa fa-home"></i> -->
</body>

</html>