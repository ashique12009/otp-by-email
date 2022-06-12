<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Process OTP</title>
</head>
<body>
    <div class="main-container">
        <div class="flex-container h-100vh">
            <div class="msg-wrapper">
                <?php 
                    // Start with PHPMailer class
                    use PHPMailer\PHPMailer\PHPMailer;
                    require_once '../vendor/autoload.php';

                    $email = $_POST['email'];

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo 'Email is not valid';
                    }
                    else {
                        // create a new object
                        $mail = new PHPMailer();
                        // configure an SMTP
                        $mail->isSMTP();
                        $mail->Host = 'smtp.mailtrap.io';
                        $mail->SMTPAuth = true;
                        $mail->Username = '8c47d5a7abace5';
                        $mail->Password = '7b69ef42c5e37e';
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 2525;

                        $mail->setFrom('confirmation@hotel.com', 'Your Hotel');
                        $mail->addAddress($email);
                        $mail->Subject = 'Take your OTP!';
                        // Set HTML
                        $mail->isHTML(TRUE);
                        $mail->Body = "<html>Hi there, here is your OTP: $otp.</html>";
                        $mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';
                        // add attachment
                        // $mail->addAttachment('//confirmations/yourbooking.pdf', 'yourbooking.pdf');
                        // send the message
                        if (!$mail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else {
                            echo 'Message has been sent';
                        }
                    }
                ?>
                <a href="index.php">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>