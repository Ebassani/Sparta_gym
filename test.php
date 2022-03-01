<?php
include 'db.php' ;
/**
 * @var mysqli $conn
 */
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$passw= $_POST['passw'];
$uname= $_POST['uname'];


$sql="insert into customers (fname, lname, adress, phone_number, payment_id)
values('$fname', '$lname', '$passw', '$uname', 1)";

    if($conn->query($sql) === TRUE) {
        echo "New record added";
    }
    else
    {
        echo "ERROR: " .$sql. "<br>" . $conn->error;
    }
    $conn->close();

