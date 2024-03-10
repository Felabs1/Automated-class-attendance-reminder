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
    <div class="w3-auto">
    <form id="signupForm" class="w3-card w3-round w3-white w3-padding">
            <h4>Add new Lecturer</h4>
            <hr>
            <label for="">email</label>
            <input type="text" name="email" id="email" class="w3-input w3-border w3-round">
            <label for="">idNumber</label>
            <input type="text" name="admission" id="admission" class="w3-input w3-border w3-round">
            <label for="">password</label>
            <input type="password" name="password" id="password" class="w3-input w3-border w3-round">
            <label for="">names</label>
            <input type="text" name="names" id="names" class="w3-input w3-border w3-round">
            <label for="">phone number</label>
            <input type="text" name="phoneNumber" id="phoneNumber" class="w3-input w3-border w3-round">
            
            <br>
            <br>
            <button type="button" class="w3-button w3-purple w3-block w3-round" onclick="registerLecturer()">add Lecturer</button>

        </form>
    </div>

    <script src="./javascript/app.js"></script>
    
</body>
</html>