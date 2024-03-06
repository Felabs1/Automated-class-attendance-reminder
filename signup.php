<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/w3.css">
    <link rel="stylesheet" type="text/css" href="./css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div class="background-wallpaper" style="position: relative;
  background-image: url('../images/loginwallpaper.jpg');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  height: 970px;">
        <div class="background-overlay" style="background-color: rgba(0, 0, 0, 0.5);
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin-right: 0px;
  margin-left: 0px;
  margin-top: 0px;
  margin-bottom: 0px;">
        <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
            <div class="w3-auto" style="width: 30rem">
            <form id="signupForm" class="w3-card w3-round w3-white w3-padding">
            <h4>Signup</h4>
            <hr>
            <label for="">email</label>
            <input type="text" name="email" id="email" class="w3-input w3-border w3-round">
            <label for="">admission</label>
            <input type="text" name="admission" id="admission" class="w3-input w3-border w3-round">
            <label for="">password</label>
            <input type="password" name="password" id="password" class="w3-input w3-border w3-round">
            <label for="">names</label>
            <input type="text" name="names" id="names" class="w3-input w3-border w3-round">
            <label for="">phone number</label>
            <input type="text" name="phoneNumber" id="phoneNumber" class="w3-input w3-border w3-round">
            <label for="">course</label>
            <select name="course" class="w3-select w3-border w3-round">
                <option value="ccs">Computer Science</option>
                <option value="ccT">Computer Technology</option>
                <option value="TMC">Maths Computer
                </option>
            </select>
            <label for="">Year of study</label>
            <select class="w3-select w3-border w3-round" name="year" id="year">
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
            </select>
            <br>
            <br>
            <button type="button" class="w3-button w3-purple w3-block w3-round" onclick="register()">Register</button>

        </form>
        </div>
        </div>
     </div>
     <script src="./javascript/app.js"></script>
</body>
</html>