<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sparta Gym</title>
    <style>
        #textLogin {
            display: none;
        }
    </style>
</head>

<body class="pageBody">
<?php
include "db.php";
include "header.php";
/**
 * @var mysqli $conn
 */

session_start();

$username = $_SESSION['name'];
$password = $_SESSION['passw'];

$sql = "SELECT * FROM customers WHERE uname = '$username' and passw = '$password'";

$result = $conn->query($sql);
$obj = $result->fetch_object();
$name = $obj->fname;

$result = $conn->query($sql);

$count = mysqli_num_rows($result);
if ($count != 1) {
    header("location:login.php");
    exit();
}

?>

<div class="page1">
    <div class="pageDiv">
        <h1><?php echo "Welcome $name" ?></h1>
        <?php

        if ($result->num_rows > 0) {
            echo '<div class="infoDisplay flex-container">';
            while ($row = $result->fetch_assoc()) {
                echo "<div class='column infoRow'><h4><b>ID</b></h4><h5>" . $row["id"] .
                    "</h5></div><div class='column infoRow'><h4><b>First Name</b></h4><h5>" . $row["fname"] .
                    "</h5></div><div class='column infoRow'><h4><b>Last Name</b></h4><h5>" . $row["lname"] .
                    "</h5></div><div class='column infoRow'><h4><b>Phone Number</b></h4><h5>" . $row["phone_number"] .
                    "</h5></div><div class='column infoRow'><h4><b>Payment id</b></h4><h5>" . $row["payment_id"] .
                    "</h5></div><div class='column infoRow'><h4><b>Registration Date</b></h4><h5>" . $row["registration_date"] .
                    "</h5></div><div class='column infoRow'><h4><b>Username</b></h4><h5>" . $row["uname"] . "</h5></div>";
            }
            echo "</div>";
        } else {
            echo "no results";
        }
        $result = mysqli_query($conn, "SELECT * FROM customers WHERE uname= '$username'");
        $row = mysqli_fetch_array($result);
        ?>
        <a href="logOut.php">
            <button class="button1" id="logOutButton">Log Out</button>
        </a>

        <button class="button1" id="updateButton">Change information</button>

        <div class="formPages" id="formChangeCustomer">
            <h2>Update Data</h2>
            <form method="post" action="">
                First Name: <br>
                <input class="border" type="text" name="fname" value="<?php echo $row['fname']; ?>">
                <br>
                Last Name :<br>
                <input class="border" type="text" name="lname" value="<?php echo $row['lname']; ?>">
                <br>
                Phone Number:<br>
                <input class="border" type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>">
                <br>
                Subscription package:<br>
                <select class="border" name="package">
                    <option value="<?php $value = $row['payment_id'];
                    echo $value ?>">
                        <?php if ($value == 1) {
                            echo "Monthly package";
                        } elseif ($value == 2) {
                            echo "Seasonal package";
                        } elseif ($value == 3) {
                            echo "Yearly package";
                        } ?></option>
                    <option value="1"> Monthly package</option>
                    <option value="2"> Seasonal package</option>
                    <option value="3"> Yearly package</option>
                </select>
                <br>
                <input class="button1 buttonGray" type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone_number'];
    $payment = $_POST['package'];
    mysqli_query($conn, "UPDATE customers set fname='$fname',lname='$lname',phone_number='$phone'
                   ,payment_id='$payment' where uname='$username' and passw='$password'");
    header('Location: page.php');
}
?>
<script>
    let change = false;
    document.getElementById("formChangeCustomer").style.display = "none";
    document.getElementById("updateButton").onclick = function () {
        changeDisplay()
    };

    function changeDisplay() {
        change = !change;
        if (change) {
            document.getElementById("formChangeCustomer").style.display = "";
        } else {
            document.getElementById("formChangeCustomer").style.display = "none";
        }
    }

</script>
</body>
</html>