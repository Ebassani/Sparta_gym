<?php include 'db.php';
$name = $_POST['name'];
$password = $_POST['password'];
$profession = $_POST['profession'];
$salary =1000;

if ($profession =="Personal Trainer"){
    $salary =3000;
}
if ($profession =="Receptionist"){
    $salary =2000;
}
if ($profession =="Manager"){
    $salary =5000;
}

$sql = "insert into staff (name,password,profession,salary)
values('$name','$password','$profession','$salary')";

if ($conn->query($sql) === TRUE) {
    echo "<b>New record added<b>" . "<br>";
    echo "<a href='index.php' class='top'><br> Home </a>";
} else {
    echo "ERROR: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>



