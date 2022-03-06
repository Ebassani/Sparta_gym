<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Css/CssStyling.css">
    <title>Sparta Gym</title>
    <style>
        #textLogin {
            display: none;
        }
    </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<body>
<?php
include "header.php";
include "db.php";
/**
 * @var mysqli $conn
 */

session_start();


$staffId = $_SESSION['id'];
$password = $_SESSION['passw'];

$sql = "SELECT * FROM staff WHERE id = '$staffId' and password = '$password'";
$result = $conn->query($sql);

$count = mysqli_num_rows($result);
if ($count != 1) {
    header("location:login.php");
    exit();
}

$obj = $result->fetch_object();
$name = $obj->name;
echo "<br><h1>Welcome $name</h1><br>";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<table class="table"><tr><th>ID</th><th>Name</th><th>Profession</th><th>Salary</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td> <td>" . $row["profession"]
            . "</td><td>" . $row["salary"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "no results";
}
?>
<a href="logOut.php">
    <button class="pageButton" id="logOutButton">Log Out</button>
</a>

<button class="pageButton" id="readCustomersButton">Check customers</button>
<button class="pageButton" id="readStaff">Check Staff</button>
<button class="pageButton" id="readMessages">Read Messages</button>

<div id="checkCustomers">
    <?php
    $sqlCustomers = "SELECT * FROM customers";
    $resultCustomers = $conn->query($sqlCustomers);
    if ($resultCustomers->num_rows > 0) {
        while ($row = $resultCustomers->fetch_assoc()) {
            echo "<div class='infoCus flex-container'><div class='column'><h4><b>ID</b></h4><p>" . $row["id"] .
                "</p></div><div class='column'><h4><b>First Name</b></h4><p>" . $row["fname"] .
                "</p></div><div class='column'><h4><b>Last Name</b></h4><p>" . $row["lname"] .
                "</p></div><div class='column'><h4><b>Phone Number</b></h4><p>" . $row["phone_number"] .
                "</p></div><div class='column'><h4><b>Payment id</b></h4><p>" . $row["payment_id"] .
                "</p></div><div class='column'><h4><b>Registration Date</b></h4><p>" . $row["registration_date"] .
                "</p></div><div class='column'><h4><b>Username</b></h4><p>" . $row["uname"] .
                "</p></div><div class='column'><h4><b>Password</b></h4><p>" . $row["passw"] .
                '</p></div><button class="button" onclick="getCustomerById('. intval($row["id"]) .')">edit</button></div>';
        }
    } else {
        echo "no results";
    }
    ?>
</div>
<p id="testing"></p>
<div id="checkStaff">
    <?php
    $sqlStaff = "SELECT * FROM staff";
    $resultStaff = $conn->query($sqlStaff);
    if ($resultStaff->num_rows > 0) {
        echo '<table class="table"><tr><th>ID</th><th>Name</th><th>Profession</th><th>Salary</th><th>Password</th></tr>';
        while ($row = $resultStaff->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td> <td>" . $row["profession"]
                . "</td><td>" . $row["salary"] . "</td><td>" . $row["password"] .
                '</td><td><button class="button" onclick="getStaffById('. intval($row["id"]) .')">edit</button></td></tr>';
        }
        echo "</table>";
    } else {
        echo "no results";
    }
    ?>
</div>

<div id="messageDisplay">
    <?php
    $sql = "SELECT * FROM message";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table"><tr><th>Name</th><th>Email</th><th>Message</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td>
            <td>". $row["message"] ."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "no messages";
    }
    ?>
</div>

<div id="popUp"></div>

<script type="text/javascript">
    if (localStorage.getItem("change") === null){
        localStorage.setItem("change","show")
    }
    if (localStorage.getItem("changeMessages") === null){
        localStorage.setItem("changeMessages","show")
    }
    if (localStorage.getItem("changeStaff") === null){
        localStorage.setItem("changeStaff","show")
    }

    let change=false;
    if (localStorage.getItem("change")==="show"){
        change=true;
    }
    let changeMessages=false;
    if (localStorage.getItem("changeMessages")==="show"){
        changeMessages=true;
    }
    let changeStaff=false;
    if (localStorage.getItem("changeStaff")==="show"){
        changeStaff=true;
    }


    if(!change){
        document.getElementById("checkCustomers").style.display = "none";
    }
    if(!changeMessages){
        document.getElementById("messageDisplay").style.display = "none";
    }
    if(!changeStaff){
        document.getElementById("checkStaff").style.display = "none";
    }

    document.getElementById("readCustomersButton").onclick = function () {
        change=changeDisplay(change,"checkCustomers");
        if (localStorage.getItem("change")==="show"){
            localStorage.setItem("change","noShow")
        }
        else {
            localStorage.setItem("change","show")
        }
    };

    document.getElementById("readMessages").onclick = function () {
        changeMessages=changeDisplay(changeMessages,"messageDisplay");
        if (localStorage.getItem("changeMessages")==="show"){
            localStorage.setItem("changeMessages","noShow")
        }
        else {
            localStorage.setItem("changeMessages","show")
        }
    };

    document.getElementById("readStaff").onclick = function () {
        changeStaff=changeDisplay(changeStaff,"checkStaff");
        if (localStorage.getItem("changeStaff")==="show"){
            localStorage.setItem("changeStaff","noShow")
        }
        else {
            localStorage.setItem("changeStaff","show")
        }
    };

    function changeDisplay(change,container) {
        change = !change;
        if (change) {
            document.getElementById(container).style.display = "";
        } else {
            document.getElementById(container).style.display = "none";
        }
        return change;
    }

    function getStaffById(number){
        $.ajax({
            type: "POST",
            url: "fetch_staff.php",
            data: {id: number},
            dataType: 'html',
            success: function(response) { $('#popUp').html(response); }
        });
        document.getElementById("popUp").classList.remove("hidden");
    }

    function getCustomerById(number){
        $.ajax({
            type: "POST",
            url: "fetch_customer.php",
            data: {id: number},
            dataType: 'html',
            success: function(response) { $('#popUp').html(response); }
        });
        document.getElementById("popUp").classList.remove("hidden");
    }

    function cancelPopUp(){
        document.getElementById("popUp").classList.add("hidden");
    }


</script>
</body>
</html>