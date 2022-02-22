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
include "db.php";
include "header.php";
/**
 * @var mysqli $conn
 */

session_start();

$username = $_SESSION['name'];
$password = $_SESSION['passw'];

$sql = "SELECT * FROM customers WHERE uname = '$username' and passw = '$password'";

$result = $conn->query($sql);
$obj = $result->fetch_object();
$name = $obj->fname;
?>
<h1><?php echo "Welcome $name" ?></h1>
<?php
$result = $conn->query($sql);

$count = mysqli_num_rows($result);
if ($count != 1) {
    $_SESSION['name'] = $username;
    $_SESSION['passw'] = $password;
    header("location:login.php");
    exit();
}
if ($result->num_rows > 0) {
    echo '<table class="table"><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone number</th><th>Package</th><th>Registration Date</th><th>Username</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fname"] . "</td> <td>" . $row["lname"]
            . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["payment_id"]
            . "</td><td>" . $row["registration_date"] . "</td>
            <td>" . $row["uname"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "no results";
}
?>
<a href="logOut.php">
    <button id="logOutButton">Log Out</button>
</a>
<script>
    document.getElementById("logOutButton").onclick = function () {
        logOut()
    };

    function logOut {

    }
</script>
</body>
</html>