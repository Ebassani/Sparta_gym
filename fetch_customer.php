<?php
include "db.php";
/**
 * @var mysqli $conn
 */
$id = $_POST['id'];

?>

<div id="popUpStaff">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM customers WHERE id= '$id'");
    $row = mysqli_fetch_array($result);
    ?>
    <h2>Update Data</h2>
    <form method="post" action="update_customer.php">
        <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
        First Name: <br>
        <label>
            <input class="border" type="text" name="fname" value="<?php echo $row['fname']; ?>">
        </label>
        <br>
        Last Name :<br>
        <label>
            <input class="border" type="text" name="lname" value="<?php echo $row['lname']; ?>">
        </label>
        <br>
        Phone Number:<br>
        <label>
            <input class="border" type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>">
        </label>
        <br>
        Password:<br>
        <label>
            <input class="border" type="text" name="password" value="<?php echo $row['passw']; ?>">
        </label>
        <br>
        Subscription package:<br>
        <label>
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
        </label>
        <br>
        <input class="button1 buttonGray" type="submit" name="submit" value="Submit">
        <button type="button" id="cancelButton" onclick="cancelPopUp()" class="button1 buttonGray">Cancel</button>
        <button class="button1 buttonGray" id="deleteButton" formaction="deleteCustomer.php">Delete</button>
    </form>
</div>

