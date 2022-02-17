<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpartaGym login</title>

    <link rel="stylesheet" href="Css/project1.css">
    <link rel="stylesheet" href="Css/CssStyling.css">
</head>
<body>
    <header>
        <div class="logo-container">
          <a href="index.php"><img class="logo" src="images/spartan.png" alt="logo" ></a>
        </div>
        <h2 class="title"><a href="index.php">Sparta Gym</a></h2>
    </header>
    <div class="middle">
        <form class="login" id="login" method="post" action="login.php">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="uname"><br>
            <label for="passw">Password:</label><br>
            <input type="text" id="passw" name="passw"><br>
            <input type="submit" value="Submit">
        </form>
        <button id="loginSwitch">Click to Join as a staff member</button>
    </div>
    <script>
        var switchForm=true;
        document.getElementById("loginSwitch").onclick = function() {newForm() };
        function newForm(){
            if(switchForm){
                document.getElementById("loginSwitch").innerHTML = "Click to Join as a customer";
                document.getElementById("login").innerHTML = '<form class="login" id="login" method="post" action="login.php><label for="fname"> name:</label><br><input type="text" id="fname" name="fname" required><br><label for="lname">Last name:</label><br><input type="text" id="lname" name="lname" required><br><label for="uname">Other information:</label><br><input type="text" id="uname" name="uname" required><br><label for="passw">Password:</label><br><input type="text" id="passw" name="passw" required><br><input type="submit" value="Click to send form"></form>';  
            }
            else{
                document.getElementById("loginSwitch").innerHTML = "Click to Join as a staff member";
                document.getElementById("login").innerHTML = '<form class="login" id="login" method="post" action="login.php><label for="fname">First name:</label><br><input type="text" id="fname" name="fname" required><br><label for="lname">Last name:</label><br><input type="text" id="lname" name="lname" required><br><label for="uname">Username:</label><br><input type="text" id="uname" name="uname" required><br><label for="passw">Password:</label><br><input type="text" id="passw" name="passw" required><br><input type="submit" value="Submit"></form>';  
            }
            switchForm = !switchForm;
        };
        
    </script>
</body>
</html>

<?php
require_once "db.php";


?>