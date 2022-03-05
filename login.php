<?php
include "db.php";
/**
 * @var mysqli $conn
 */

session_start();

if (isset($_POST['unameCus'])) {
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
    }
}

if (isset($_POST['workId'])) {
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

    }
}
$conn->close();
?>

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

<body class="loginBody">
<?php
include "header.php";
?>
<div class="login1">
    <div class="loginDiv"  id="loginDiv">
        <form class="flex-container" class="login" id="login" method="post">
            <div class="column">
                <label for="unameCus"></label>
                <input class="border" placeholder="Username..." type="text" id="unameCus" name="unameCus">
            </div>
            <div class="column">
                <label for="passw"></label>
                <input class="border" placeholder="Password..." type="password" id="passw" name="passw" >
            </div>
            <input class="button1 buttonGray" type="submit" value="Log In">
        </form>
    </div>
</div>
<button class="button1 buttonBlue" id="loginSwitch">Click to Join as a staff member</button>

<script>
    let switchForm = true;
    document.getElementById("loginSwitch").onclick = function () {
        newForm()
    };

    function newForm() {
        if (switchForm) {
            document.getElementById("loginSwitch").innerHTML = "Click to Join as a customer";
            document.getElementById("loginDiv").innerHTML = '<form class="flex-container" class="login" id="login" method="post">' +
                '<div class="column"><label for="workId"></label><input class="border" type="number" placeholder="Word Id..." id="workId" name="workId"></div>' +
                '<div class="column"><label for="passw"></label><input class="border" type="password" placeholder="Password..." id="passw" name="passw"></div>' +
                '<input class="button1 buttonGray" type="submit" value="Log In"></form>';
        } else {
            document.getElementById("loginSwitch").innerHTML = "Click to Join as a staff member";
            document.getElementById("loginDiv").innerHTML = '<form class="flex-container" class="login" id="login" method="post"><div class="column"><label for="unameCus"></label><input class="border" placeholder="Username..." type="text" id="unameCus" name="unameCus"></div><div class="column"><label for="passw"></label><input class="border" placeholder="Password..." type="password" id="passw" name="passw" ></div><input class="button1 buttonGray" type="submit" value="Log In"></form>';
        }
        switchForm = !switchForm;
    }

</script>
</body>
</html>