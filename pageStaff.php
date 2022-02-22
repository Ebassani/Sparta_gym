<?php
include "db.php";
/**
 * @var mysqli $conn
 */

session_start();

$username = $_SESSION['name'];
$password = $_SESSION['passw'];

$sql = "SELECT * FROM staff WHERE id = '$username' and password = '$password'";
$result = $conn->query($sql);
$obj = $result->fetch_object();
$name = $obj->name;
echo "<br><h1>Welcome $name</h1><br>";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table class=\"table\"><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>phone_number</th> </tr><th>Package</th><th>Registration Date</th><th>Username</th>";
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