<?php
include "db.php";
/**
 * @var mysqli $conn
 */
$id = $_POST['id'];

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone_number'];
    $payment = $_POST['package'];
    $password = $_POST['password'];
    mysqli_query($conn, "UPDATE customers set passw='$password', fname='$fname',lname='$lname',phone_number='$phone',
                     payment_id='$payment' where id='$id'");
    header("Location: pageAdm.php");
}