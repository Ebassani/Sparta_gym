<?php include 'db.php';
$fnamestf = $_POST['fnamestf'];
$lnamestf = $_POST['lnamestf'];
$unamestf = $_POST['unamestf'];
$passwordstf  = $_POST['passwstf'];


$sql = "insert into staff (fnamestf, lnamestf, unamestf, passwstf)
values('$fnamestf', '$lnamestf', '$unamestf', '$passwordstf')";

if ($conn->query($sql) === TRUE) {
    echo "New record added" . "<br>";
    echo "<a href='maincode.php' class='top'><br>Home </a>";
} else {
    echo "ERROR: " . $sql . "<br>" . $conn->error;
}
$conn->close();
