<?php
session_start();
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
print_r($_POST);
$toarray=$_POST['selected'];
$pass=$_POST['password'];

include("connection.php");
echo $_POST['tid'];
$query="SELECT emailid FROM teacher_info WHERE teacherid=\"".$_POST['tid']."\"";
echo $query;
$res=$conn->query($query);
$r=$res->fetch_assoc();

$mail->Username = $r['emailid'];			//Username to use for SMTP authentication - use full email address for gmail
$mail->Password = $pass;								//Password to use for SMTP authentication


$mail->setFrom($r['emailid']);			//Set who the message is to be sent from
?>

<html>
<body>
<p>You will be redirected in <span id="counter">5</span> second(s).</p>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'index.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
</body>
</html>







<?php
//Set an alternative reply-to address
//$mail->addReplyTo('kdasfjkl@gmail.com', 'First Last');
for($i=0;$i<sizeof($toarray);$i++)
{
	$query="SELECT emailid FROM student_info WHERE studentid=\"".$toarray[$i]."\"";
	$res=$conn->query($query);
	$r=$res->fetch_assoc();
	echo "<br/>".$r['emailid'];
	echo $_POST['body_mail'];
	echo $_POST['subject_mail'];
	$mail->addAddress($r['emailid']);			//Set who the message is to be sent to
}
	$mail->Subject = $_POST['subject_mail'];								//Set the subject line

	$mail->Body = $_POST['body_mail'];												


	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->AltBody = '';
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
		echo $r['emailid'];
	} else {
		$_SESSION['msg']="Mail sent!";
		header('location:index.php');
	}		

?>