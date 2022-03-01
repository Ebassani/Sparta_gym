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
        <input type="text" name="nameStaff" value="<?php echo $row['name']; ?>">
        <br>
        Profession :<br>
        <input type="text" name="profession" value="<?php echo $row['profession']; ?>">
        <br>
        Salary:<br>
        <input type="text" name="salary" value="<?php echo $row['salary']; ?>">
        <br>
        Password:<br>
        <input type="text" name="password" value="<?php echo $row['password']; ?>">
        <br>
        <input type="submit" name="submit" value="Submit">
        <button type="button" id="cancelButton" onclick="cancelPopUp()" class="button">Cancel</button>
    </form>
</div>
