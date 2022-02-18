<?php
$servername="127.0.0.1";
$username="root";
$password="password";
$dbName="sparta";
$port=6034;

$conn = new mysqli($servername,$username,$password,$dbName,$port);

if ($conn->connect_error){
    die("failed to connect");
}
