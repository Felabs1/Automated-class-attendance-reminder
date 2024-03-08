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
        <form id="reminder" class="w3-white w3-padding w3-round-large">
            <h3>create reminder</h3>
            <hr>
            <label for="">unit</label>
            <input class="w3-input w3-border w3-round" name="unit" id="unit"/>
            <label for="">time</label>
            <input class="w3-input w3-border w3-round" name="time" id="time"/>
            <label for="">venue</label>
            <input class="w3-input w3-border w3-round" name="venue" id="venue"/>
            <label for="">group</label>
            <select name="group" id="group">
                <option value="ccs">Computer Science</option>
                <option value="tmc">Mathematics & computer science</option>
            </select>
            <label for="">day of the week</label>
            <select id="day_of_the_week" name="day_of_the_week">
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
    <script src="./javascript/app.js"></script>
</body>
</html>