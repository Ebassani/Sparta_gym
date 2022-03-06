<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Css/CssStyling.css">
    <title>Sparta Gym</title>
    <link rel="stylesheet" href="Css/project1.css">
    <style>
        #textLogin {
            display: none;
        }
    </style>
</head>

<body class="pageBody">
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
?>
<div class="page1">
    <div class="pageDiv">
        <?php
        $obj = $result->fetch_object();
        $name = $obj->name;
        echo "<h1>Welcome $name</h1>";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<div class="infoDisplay flex-container">';
            while ($row = $result->fetch_assoc()) {
                echo "<div class='column infoRow'><h4><b>ID</b></h4><h5>" . $row["id"] .
                    "</h5></div><div class='column infoRow'><h4><b>Name</b></h4><h5>" . $row["name"] .
                    "</h5></div><div class='column infoRow'><h4><b>Profession</b></h4><h5>" . $row["profession"] .
                    "</h5></div><div class='column infoRow'><h4><b>Salary</b></h4><h5>" . $row["salary"] . "</h5></div>";
            }
            echo "</div>";
        } else {
            echo "no results";
        }

        $result = mysqli_query($conn, "SELECT name FROM staff WHERE id= '$staffId'");
        $row = mysqli_fetch_array($result);
        ?>
        <a href="logOut.php">
            <button class="button1 buttonGray" id="logOutButton">Log Out</button>
        </a>
        <button class="button1 buttonGray" id="updateButton">Change Name</button>
        <button class="button1 buttonGray" id="readMessages">Read Messages</button>

        <div class="formPages" id="nameChangeStaff">
            <form method="post" action="">
                Name:<br><input class="border" type="text" name="name" value="<?php echo $row['name']; ?>"><br>
                <input class="button1 buttonGray" type="submit" value="Save change">
            </form>
        </div>

        <div class="formPages" id="messageDisplay">
            <?php
            $sql = "SELECT * FROM message";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="infoDisplay flex-container">';
                    echo "<div class='column infoRow'><h4><b>Sender</b></h4><p>" . $row["name"] .
                        "</p></div><div class='column infoRow'><h4><b>Email</b></h4><p>" . $row["email"] .
                        "</p></div><div class='column infoRow'><h4><b>Message</b></h4><p>" . $row["message"] . "</p></div>";
                    echo "</div>";
                }
            } else {
                echo "no messages";
            }

            ?>
        </div>
    </div>
</div>

<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    mysqli_query($conn, "UPDATE staff set name='$name' where id='$staffId'");
    header("Location: pageStaff.php");
}
?>

<script>
    let change = false;
    let changeMessages = false;
    document.getElementById("nameChangeStaff").style.display = "none";
    document.getElementById("updateButton").onclick = function () {
        changeDisplay()
    };

    document.getElementById("messageDisplay").style.display = "none";
    document.getElementById("readMessages").onclick = function () {
        changeDisplayMessages()
    };

    function changeDisplay() {
        change = !change;
        if (change) {
            document.getElementById("nameChangeStaff").style.display = "";
        } else {
            document.getElementById("nameChangeStaff").style.display = "none";
        }
    }

    function changeDisplayMessages() {
        changeMessages = !changeMessages;
        if (changeMessages) {
            document.getElementById("messageDisplay").style.display = "";
        } else {
            document.getElementById("messageDisplay").style.display = "none";
        }
    }
</script>
</body>
</html>
