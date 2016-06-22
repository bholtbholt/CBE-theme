<?php
if($_POST){
	//get data
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$lawArea=$_POST['lawArea'];
	$message= "$name has used the contact form on cbelaw.com\nto request further information on $lawArea:\n\n";
	$message.=$_POST['message'];
	$message.="\n\n$name\n$phone\n$email";

	//send email
	mail("info@cbelaw.com", "cbelaw.com: New message from $name",	$message, "From:" . $email);
}
?>