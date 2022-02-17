<?php include 'db.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$registration_date = $_POST['registration_date'];
if (empty($_POST['fname'])) {
    echo "<h1>Please input your  first name</h1>";
} else {
    $sql = "insert into customers(fname, lname, uname, password,phone_number,registration_id)
values('$fname', '$lname', '$uname', '$password','$phone_number','$registration_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added";
        echo "<a href='formadmin.php' class='top'>Home </a>";
    } else {
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
