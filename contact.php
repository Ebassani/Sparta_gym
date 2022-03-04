<?php

if (empty($_POST['fname']) OR empty($_POST['lname']) OR empty($_POST['email']) OR empty($_POST['message'])) {
    echo "some inputs are missing";
}

else {
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $email= $_POST['email'];
  $message= $_POST['message'];


  $msg=$fname." ".$lname." is trying to contact you from ".$email.". Here is the message: ".$content;
  
  mail($email,$email."sent a contact request",$msg);
}

?>