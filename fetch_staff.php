<?php
include "db.php";
/**
 * @var mysqli $conn
 */
$id = $_POST['id'];

?>

<div id="popUpStaff">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM staff WHERE id= '$id'");
    $row = mysqli_fetch_array($result);
    ?>
    <h2>Update Data</h2>
    <form method="post" action="update_staff.php">
        <input name="id" style="display: none" value="<?php echo $row['id']; ?>">
        Name: <br>
        <input class="border" type="text" name="nameStaff" value="<?php echo $row['name']; ?>">
        <br>
        Profession :<br>
        <input class="border" type="text" name="profession" value="<?php echo $row['profession']; ?>">
        <br>
        Salary:<br>
        <input class="border" type="text" name="salary" value="<?php echo $row['salary']; ?>">
        <br>
        Password:<br>
        <input class="border" type="text" name="password" value="<?php echo $row['password']; ?>">
        <br>
        <input class="button1 buttonGray" type="submit" name="submit" value="Submit">
        <button class="button1 buttonGray" type="button" id="cancelButton" onclick="cancelPopUp()">Cancel</button>
        <button class="button1 buttonGray" id="deleteButton" formaction="deleteStaff.php">Delete</button>
    </form>
</div>
