<?php

if (isset($_POST["submit"])) {
    $message = $_POST['message'];
    $email = $_POST['mail'];
    $name = $_POST['name'];

    if (!$_POST['name']){
        $nameErr = 'enter name';
    }
    if (!$_POST['message']){
        $messageErr = 'enter message';
    }
    if (!$_POST['name']){
        $emailErr = 'enter email';
    }

}


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'lennert@verreth.be';                     // SMTP username
    $mail->Password   = 'toucpumwwbpbafst';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, 'Mailer');
    $mail->addAddress("lennert@verreth.be", 'lennert verreth');     // Add a recipient
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "mail has been send";
} catch (Exception $e) {
    echo "Message could not be sent";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<p>* fields required</p>
<form class="contact-form" method="post">
    Fullname <input type="text" name="name" placeholder="Full Name">
    <span class="error">* <?php echo $nameErr;?></span><br>
    Email <input type="email" name="mail" placeholder="Em@il">
    <span class="error">* <?php echo $emailErr;?></span><br>
    Message <textarea name="message" id="" cols="30" rows="1" placeholder="Message"></textarea>
    <span class="error">* <?php echo $messageErr;?></span><br>
    <button type="submit" name="submit">SeNd MaIl</button>

</form>
    
</body>
</html>