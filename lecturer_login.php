<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/w3.css">
    <link rel="stylesheet" type="text/css" href="./css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <title>Document</title>
</head>

<body>


    <div class="background-wallpaper" style="position: relative;
  background-image: url('./images/loginwallpaper.jpg');
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
                <form id="frmLogin" class="w3-card w3-round w3-white w3-padding">
                    <h4>Login As a Lecturer</h4>
                    <hr>
                    <label for="">username</label>
                    <input type="text" name="username" id="username" class="w3-input w3-border w3-round">
                    <label for="">password</label>
                    <input type="password" name="password" id="password" class="w3-input w3-border w3-round">
                    <br>
                    <button class="w3-button w3-purple w3-block w3-round" type="button"
                        onclick="lecturerLogin()">Login</button>

                    <div class="w3-center">
                        <p>or </p>
                        <a href="login.php">login as student</a>
                        <br>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="./javascript/app.js"></script>

</body>

</html>