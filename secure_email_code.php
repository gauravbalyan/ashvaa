<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["2-name"]==""||$_POST["2-website"]==""||$_POST["2-comment"]==""){
echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> Please fill all the fields.</div>";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['2-website'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
$error_message .= 'The Email Address you entered does not appear to be valid..';
}
else{
$subject = $_POST['2-name']." : ".$_POST["2-phone-number"];
$message = $_POST['2-comment'];
$headers = 'From:'. $email . "\r\n"; // Sender's Email
$headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 80);
// Send Mail By PHP Mail Function
mail("info@ashvaa.com", $subject, $message, $headers);
echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> Your message has been sent successfully.</div>";
}
}
}
?>