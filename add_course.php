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
    <div class="w3-auto" style="width: 30rem">
        <div class="w3-white w3-padding w3-round-large">
            <h3>add course</h3>
            <hr>
            <label for="">course code</label>
            <input class="w3-input w3-border w3-round" name="course_code" id="course_code"/>
            <label for="">course Name</label>
            <input class="w3-input w3-border w3-round" name="course_name" id="course_name"/>
            <br>
            <button class="w3-button w3-purple w3-round">Add</button>
        </div>
    </div>
    
</body>
</html>