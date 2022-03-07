<?php include 'db.php';
$fnamec = $_POST['fnamec'];
$lnamec = $_POST['lnamec'];
$emailc = $_POST['emailc'];


$sql = "insert into customers(fnamec, lnamec, email)
values('$fnamec', '$lnamec', '$emailc')";

if ($conn->query($sql) === TRUE) {
    echo "New record added"."<br>";
    echo "<a href='index.php' class='top'><br>Home </a>";
} else {
    echo "ERROR: " . $sql . "<br>" . $conn->error;
}
$conn->close();