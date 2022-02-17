<?php
$servername="db";
$username="sparta";
$password="iHbZLft-e!jv*CgS";
$dbName="sparta";

$conn= new mysqli($servername,$username,$password,$dbName);

if ($conn->connect_error){
    die("failed to connect");
}
?>