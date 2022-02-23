<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Css/CssStyling.css">
    <title>Sparta Gym</title>
    <link rel="stylesheet" href="Css/project1.css">
    <style>
        #textLogin {
            display: none;
        }
    </style>
</head>

<body>
<?php
include "header.php";
include "db.php";
/**
 * @var mysqli $conn
 */

session_start();

$staffId = $_SESSION['id'];
$password = $_SESSION['passw'];

$sql = "SELECT * FROM staff WHERE id = '$staffId' and password = '$password'";
$result = $conn->query($sql);

$count = mysqli_num_rows($result);
if ($count != 1) {
    header("location:login.php");
    exit();
}

$obj = $result->fetch_object();
$name = $obj->name;
echo "<br><h1>Welcome $name</h1><br>";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<table class="table"><tr><th>ID</th><th>Name</th><th>Profession</th><th>Salary</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td> <td>" . $row["profession"]
            . "</td><td>" . $row["salary"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "no results";
}
?>
<a href="logOut.php">
    <button class="pageButton" id="logOutButton">Log Out</button>
</a>

<button class="pageButton" id="readCustomersButton">Check customers</button>
<button class="pageButton" id="readMessages">Read Messages</button>

<div id="checkCustomers">
    <?php
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table"><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone number</th><th>Package</th><th>Registration Date</th><th>Username</th><th>Password</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fname"] . "</td> <td>" . $row["lname"]
                . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["payment_id"]
                . "</td><td>" . $row["registration_date"] . "</td>
            <td>" . $row["uname"] . "</td><td>" . $row["passw"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "no results";
    }
    ?>
</div>

<div class="checkStaff">
    <?php
    $sql = "SELECT * FROM staff";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table"><tr><th>ID</th><th>Name</th><th>Profession</th><th>Salary</th><th>Password</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td> <td>" . $row["profession"]
                . "</td><td>" . $row["salary"] . "</td><td>" . $row["password"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "no results";
    }
    ?>
</div>

<div id="messageDisplay">
    <?php
    $sql = "SELECT * FROM message";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table"><tr><th>Name</th><th>Email</th><th>Message</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td>
            <td>". $row["message"] ."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "no messages";
    }
    ?>
</div>

<script>
    let change = false;
    let changeMessages = false;
    document.getElementById("checkCustomers").style.display = "none";
    document.getElementById("readCustomersButton").onclick = function () {
        changeDisplay()
    };

    document.getElementById("messageDisplay").style.display = "none";
    document.getElementById("readMessages").onclick = function () {
        changeDisplayMessages()
    };

    function changeDisplay() {
        change = !change;
        if (change) {
            document.getElementById("checkCustomers").style.display = "initial";
        } else {
            document.getElementById("checkCustomers").style.display = "none";
        }
    }

    function changeDisplayMessages() {
        changeMessages = !changeMessages;
        if (changeMessages) {
            document.getElementById("messageDisplay").style.display = "initial";
        } else {
            document.getElementById("messageDisplay").style.display = "none";
        }
    }
</script>
</body>
</html>