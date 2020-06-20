<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    Send to:<input type="text" name="receiver"/><br>
    Subject:<input type="text" name="subject"/><br>
    Message:<textarea name="message"></textarea><br>
    Select File:<input type="file" name="file"/><br>
    <input type="submit" name="submit"/>


    </form>

    <?php
        if (isset($_POST["submit"])){
            require "php-mailer-master/PHPMailerAutoload.php";
//Start***********************

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$sender="nemodorylab2018@gmail.com";

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $sender;                 // SMTP username
$mail->Password = 'computerlab';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($sender, 'Mailer');
$mail->addAddress($_POST["receiver"]);     // Add a recipient
/*$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');
My comment */

$file_name=$_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"],$file_name);

$mail->addAttachment($file_name);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST["subject"];
$mail->Body    = $_POST["message"];
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
   // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}




//END**************************
        }
    ?>


</body>
</html>