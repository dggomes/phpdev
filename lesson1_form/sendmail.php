<?php
 //start building the mail string
$msg  = "Name:    ".$_POST['name']."</p>";
$msg .= "E-Mail:  ".$_POST['email']."</p>";
$msg .= "Message: ".$_POST['message']."</p>";
//set up the mail
$recipient = "dg.gomes@gmail.com";
$subject = "Form Submission Results";
$mailheaders  = "From: My Web Site <defaultaddress@yourdomain.com> \n";
$mailheaders .= "Reply-To: ".$_POST['email'];
//send the mail
mail($recipient, $subject, $msg, $mailheaders);
?>
<!DOCTYPE html>
<html>
<head>
<title>Sending mail from the form in Listing 11.10</title>
</head>
<body>
<p>Thanks, <strong><?php echo $_POST['name']; ?></strong>,
   for your message.</p>
<p>Your e-mail address:
  <strong><?php echo $_POST['email']; ?></strong></p>
<p>Your message: <br/> <?php echo $_POST['message']; ?> </p>
</body>
</html>