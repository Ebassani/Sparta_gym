<?php
include "db.php";
/**
 * @var mysqli $conn
 */
$id = $_POST['id'];

mysqli_query($conn,"DELETE FROM staff where id='$id'");
header("Location: pageAdm.php");