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
        <a href="index.php"><img class="logo" src="images/spartan.png" alt="logo"></a>
    </div>
    <h2 class="title"><a href="index.php">Sparta Gym</a></h2>
</header>
<div class="middle">
    <form class="login" id="login" method="post">
        <label for="uname">Username:</label><br>
        <input type="text" id="unameCus" name="unameCus" required><br>
        <label for="passw">Password:</label><br>
        <input type="text" id="passw" name="passw" required><br>
        <input type="submit" value="Submit">
    </form>
    <button id="loginSwitch">Click to Join as a staff member</button>
</div>
<script>
    let switchForm = true;
    document.getElementById("loginSwitch").onclick = function () {
        newForm()
    };

    function newForm() {
        if (switchForm) {
            document.getElementById("loginSwitch").innerHTML = "Click to Join as a customer";
            document.getElementById("login").innerHTML = '<form class="login" id="login" method="post"><label for="workId">Work Id:</label><br><input type="text" id="workId" name="workId" required><br><label for="passw">Password:</label><br><input type="text" id="passw" name="passw" required><br><input type="submit" value="Submit"></form>';
        } else {
            document.getElementById("loginSwitch").innerHTML = "Click to Join as a staff member";
            document.getElementById("login").innerHTML = '<form class="login" id="login" method="post"><label for="uname">Username:</label><br><input type="text" id="unameCus" name="unameCus" required><br><label for="passw">Password:</label><br><input type="text" id="passw" name="passw" required><br><input type="submit" value="Submit"></form>';
        }
        switchForm = !switchForm;
    }

</script>
</body>
</html>

<?php
include "db.php";
/**
 * @var mysqli $conn
 */

session_start();

$sql = "select * from customers";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
//fetch_assoc(): It fetches result as an associative array.
    echo "<table class=\"table\"><tr><th>ID</th><th>First Name</th><th>Last Name</th>
<th>adress</th><th>phone_number</th> </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fname"] . "</td> <td>" . $row["lname"]

            . "</td><td>" . $row["adress"] . "</td><td>" . $row["phone_number"]
            . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "no results";
}


//actual Code

if (isset($_POST['unameCus'])) {
    $username = $_POST['unameCus'];
    $password = $_POST['passw'];

    $sql = "SELECT id FROM customers WHERE phone_number = '$username' and adress = '$password'";
    $result = $conn->query($sql);

    $count = mysqli_num_rows($result);
    if($count == 1) {
        $_SESSION['name'] = $username;
        $_SESSION['passw'] = $password;
        header("location:page.php");
        exit();

    }else {
        echo "tenta de novo";
    }
}
$conn->close();
?>