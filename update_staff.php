<?php
include "db.php";
/**
 * @var mysqli $conn
 */
$id = $_POST['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['nameStaff'];
    $profession = $_POST['profession'];
    $salary = $_POST['salary'];
    $password = $_POST['password'];
    mysqli_query($conn, "UPDATE staff set name='$name',profession='$profession',salary='$salary',password='$password' where id='$id'");
    header("Location: pageAdm.php");
}