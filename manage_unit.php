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
    <div class="w3-auto" >
    <table class="w3-table w3-bordered">
            <tr>
                <th>unit code</th>
                <th>unit name</th>
                <th>course code</th>
                <th>action</th>

            </tr>
            <tr>
                <td>CCS 215</td>
                <td>software development</td>
                <td>CCS</td>
                <td><button class="w3-button w3-padding-small w3-grey w3-round">Edit</button>&nbsp;<button class="w3-button w3-padding-small w3-red w3-round">Delete</button></td>
            </tr>
        </table>

    </div>
    <script src="./javascript/app.js"></script>
</body>
</html>