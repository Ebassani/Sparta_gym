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
            echo '<table class="table"><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone number</th><th>Package</th><th>Registration Date</th><th>Username</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fname"] . "</td> <td>" . $row["lname"]
                    . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["payment_id"]
                    . "</td><td>" . $row["registration_date"] . "</td>
            <td>" . $row["uname"] . "</td></tr>";
            }
            echo "</table>";
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

        <div class="changeDataCustomer" id="formChangeCustomer">
            <h2>Update Data</h2>
            <form method="post" action="">
                First Name: <br>
                <input type="text" name="fname" value="<?php echo $row['fname']; ?>">
                <br>
                Last Name :<br>
                <input type="text" name="lname" value="<?php echo $row['lname']; ?>">
                <br>
                Phone Number:<br>
                <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>">
                <br>
                Subscription package:<br>
                <select name="package">
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
                <input type="submit" name="submit" value="Submit">
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
    mysqli_query($conn, "UPDATE customers set fname='$fname',lname='$lname',phone_number='$phone',payment_id='$payment' where uname='$username' and passw='$password'");
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