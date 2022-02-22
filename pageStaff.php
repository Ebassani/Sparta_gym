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

$username = $_SESSION['name'];
$password = $_SESSION['passw'];

$sql = "SELECT * FROM staff WHERE id = '$username' and password = '$password'";
$result = $conn->query($sql);
$obj = $result->fetch_object();
$name = $obj->name;
echo "<br><h1>Welcome $name</h1><br>";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table class=\"table\"><tr><th>ID</th><th>Name</th><th>Profession</th><th>Salary</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td> <td>" . $row["profession"]
            . "</td><td>" . $row["salary"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "no results";
}