<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/SMTP.php';



if (!isset($_POST["first-name"])) {
	die("First name not provided.");
}
if (!isset($_POST["last-name"])) {
	die("Last name not provided.");
}
if (!isset($_POST["email"])) {
	die("Email not provided.");
}
if (!isset($_POST["message"])) {
	die("Message not provided.");
}


// TODO add verification
$sender_name = htmlentities($_POST["first-name"] . " " . $_POST["last-name"]);
$sender_address = htmlentities($_POST["email"]);
$sender_message = htmlentities($_POST["message"]);

// constructing the mail for the sender
$sender_mail = new PHPMailer();
$sender_mail->IsSMTP();
$sender_mail->Mailer = "smtp";
//$applicant_mail->SMTPDebug  = 1;
$sender_mail->SMTPAuth = TRUE;
$sender_mail->SMTPSecure = "tls";
$sender_mail->Port = 587;
$sender_mail->Host = "sola.hanna@gmail.com";
$sender_mail->Username = "thespartagym@gmail.com";
$sender_mail->Password = GMAIL_PASSWD;

$sender_mail->IsHTML(true);

// message to be displayed on the site
$message = null;

// actual e-mail content
$sender_content = "
<p>Hello, $sender_name, your contact form has been successfully received! Your message was:</p>
<p>$sender_message</p>
<p>We will get back to you shortly, please be patient.</p>
<p>Best regards,</p><br/>
<p style='font-size: 1.3em'>Sparta Gym</p>
";

$receiver_content = "
<h2>New application - $sender_name</h2>
<p>E-mail: $sender_address</p>
<p>Message: $sender_message</p>
";

try {
	$sender_mail->Subject = "Contact form";
	$sender_mail->addAddress($sender_address, $sender_name);
	$sender_mail->setFrom("thespartagym@gmail.com", "Sparta Gym Notifications");
	$sender_mail->msgHTML($sender_content);
	$sender_mail->send();

	$sender_mail->Subject = "Contact form";
    $sender_mail->clearAddresses();
	$sender_mail->addAddress("sola.hanna@gmail.com", $sender_name);
	$sender_mail->AddReplyTo($sender_address, $sender_name);
	$sender_mail->msgHTML($receiver_content);
	if (!$sender_mail->send()) {
		$message = "Unfortunately, an error has occurred and the application hasn't been sent successfully.";
	} else {
		$message = "Your application has been sent successfully!";
	}
} catch (Exception $e) {
	// this part of code shouldn't be reached because all validation should be done beforehand
}

