<?php include 'db.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$password = $_POST['passw'];
$phone_number = $_POST['phone_number'];

$sql = "insert into customers(fname, lname, uname, passw,phone_number,payment_id)
values('$fname', '$lname', '$uname', '$password','$phone_number',1)";

if ($conn->query($sql) === TRUE) {
    echo "New record added"."<br>";
    echo "<a href='createcustomer.php' class='top'><br>Home </a>";
} else {
    echo "ERROR: " . $sql . "<br>" . $conn->error;
}
$conn->close();
