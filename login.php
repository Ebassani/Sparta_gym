<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpartaGym login</title>

    <link rel="stylesheet" href="Css/project1.css">
    <link rel="stylesheet" href="Css/CssStyling.css">
</head>
<body>
<?php
include "header.php";
?>
<div class="loginBody">
    <div class="loginDiv">
        <form class="login" id="login" method="post">
            <label for="unameCus">Username:</label><br>
            <input type="text" id="unameCus" name="unameCus"><br>
            <label for="passw">Password:</label><br>
            <input type="password" id="passw" name="passw" ><br>
            <input type="submit" value="Submit">
        </form>
        <button id="loginSwitch">Click to Join as a staff member</button>
    </div>
</div>
<script>
    let switchForm = true;
    document.getElementById("loginSwitch").onclick = function () {
        newForm()
    };

    function newForm() {
        if (switchForm) {
            document.getElementById("loginSwitch").innerHTML = "Click to Join as a customer";
            document.getElementById("login").innerHTML = '<form class="login" id="login" method="post"><label for="workId">Work Id:</label><br><input type="number" id="workId" name="workId"><br><label for="passw">Password:</label><br><input type="password" id="passw" name="passw"><br><input type="submit" value="Submit"></form>';
        } else {
            document.getElementById("loginSwitch").innerHTML = "Click to Join as a staff member";
            document.getElementById("login").innerHTML = '<form class="login" id="login" method="post"><label for="uname">Username:</label><br><input type="text" id="unameCus" name="unameCus"><br><label for="passw">Password:</label><br><input type="password" id="passw" name="passw" ><br><input type="submit" value="Submit"></form>';
        }
        switchForm = !switchForm;
    }

</script>
</body>
</html>

<?php
include "db.php";
/**
 * @var mysqli $conn
 */

session_start();

if (isset($_POST['unameCus']) && $_POST['unameCus'] != "" && $_POST['passw'] != '') {
    $username = $_POST['unameCus'];
    $password = $_POST['passw'];

    $sql = "SELECT id FROM customers WHERE uname = '$username' and passw = '$password'";
    $result = $conn->query($sql);

    $count = mysqli_num_rows($result);
    if($count == 1) {
        $_SESSION['name'] = $username;
        $_SESSION['passw'] = $password;
        header("location:page.php");
        exit();

    }else {
        echo "Password or username wrong, please try again.";
    }
}

if (isset($_POST['workId']) && $_POST['workId'] != "" && $_POST['passw'] != '') {
    $workId = $_POST['workId'];
    $passw = $_POST['passw'];

    $sql = "SELECT profession FROM staff WHERE id = '$workId' and password = '$passw'";
    $result = $conn->query($sql);
    $obj = $result->fetch_object();
    $count = mysqli_num_rows($result);

    if($count == 1) {
        $prof=$obj->profession;
        $_SESSION['id'] = $workId;
        $_SESSION['passw'] = $passw;
        if($prof=="admin"){
            header("location:pageAdm.php");
        }
        else{
            header("location:pageStaff.php");
        }
        exit();

    }else {
        echo "Password or work Id wrong, please try again.";
    }
}
$conn->close();
?>