<?php
include "db.php";
/**
 * @var mysqli $conn
 */

session_start();

$username = $_SESSION['name'];
$password = $_SESSION['passw'];

$sql = "SELECT * FROM customers WHERE phone_number = '$username' and adress = '$password'";
$result = $conn->query($sql);
$obj = $result->fetch_object();
$name = $obj->fname;
echo "<br><h1>Welcome $name</h1><br>";

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
