<?php
include "db.php";
/**
 * @var mysqli $conn
 */
$id = $_POST['id'];

mysqli_query($conn,"DELETE FROM customers where id='$id'");