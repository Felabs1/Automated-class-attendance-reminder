<?php
session_start();
include("./backend/crud.php");
$crud = new Crud("127.0.0.1", "root", "", "acar");
$fetch = $crud->fetch_data("SELECT * FROM courseregistration");
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
    <style>
        th, td{
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <?php require("./navigation.php"); ?>
<br>
    <div class="w3-auto">
        
        <?php  
            if(isset($_GET['course_code'])){
                $course_code = $_GET['course_code'];
                $fetch2 = $crud->fetch_data("select * from courseregistration where courseCode = '$course_code'");
                ?>
                <div class="w3-auto" style="width: 30rem">
                    <form action="">
                        <label for="">Course Code</label>
                        <input type="text" class="w3-input w3-border w3-round" value="<?php echo $_GET['course_code']; ?>" />
                        <label for="">Course Name</label>
                        <input type="text" class="w3-input w3-border w3-round" value="<?php echo $fetch2[0]["courseName"]; ?>" />
                        <button class="w3-button w3-border w3-round">Submit</button>
                    </form>
            </div>
            <br>
                
                <?php
            }
        ?>
        <table class="w3-table w3-bordered">
            <tr>
                <th>course code</th>
                <th>course name</th>
                <th>action</th>
            </tr>
            <?php
            foreach($fetch as $row){

                ?>
                 <tr>
                    <td><?php echo $row['courseCode']; ?></td>
                    <td><?php echo $row['courseName']; ?></td>
                    <td><a href="./manage_course.php?course_code=<?php echo $row['courseCode']; ?>" class="w3-button w3-padding-small w3-grey w3-round">Edit</a>&nbsp;<button class="w3-button w3-padding-small w3-red w3-round">Delete</button></td>
                </tr>
                <?php
            }
             ?>
           
        </table>
    </div>
    <!-- <i class="fa fa-home"></i> -->
</body>
</html>