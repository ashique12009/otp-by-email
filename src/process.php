<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Send OTP</title>
</head>
<body>
    <div class="main-container">
        <div class="flex-container h-100vh">
            <div class="msg-wrapper">
                <?php 
                    require_once '../vendor/autoload.php';

                    // Start with PHPMailer class
                    use PHPMailer\PHPMailer\PHPMailer;
                    use OTPAPP\Otp_Provider;
                    use OTPAPP\Database;

                    $email = $_POST['email'];

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo 'Email is not valid';
                    }
                    else {
                        // Check this email is in our system or not
                        $db = new Database();
                        $email_checker_result = $db->check_email_exists_or_not($email);

                        if ($email_checker_result) {

                            $otp_provider_object = new Otp_Provider();
                            // Get OTP
                            $otp = $otp_provider_object->get_otp();
                            // echo '<pre>'; 
                            // var_dump($otp);
                            // echo '</pre>';exit;

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

                            $mail->setFrom('ashique12009@gmail.com', 'Kh Ashique Mahamud');
                            $mail->addAddress($email);
                            $mail->Subject = 'Take your OTP!';
                            // Set HTML
                            $mail->isHTML(TRUE);
                            $mail->Body = "<html>Hi there, here is your OTP: $otp.</html>";
                            $mail->AltBody = "Hi there, here is your OTP: $otp.";
                            // add attachment
                            // $mail->addAttachment('//confirmations/yourbooking.pdf', 'yourbooking.pdf');
                            // send the message
                            if (!$mail->send()) {
                                echo 'Message could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
                                $msg = 'OTP has been sent to your email';
                                header("Location: otp_verifier.php?msg=".$msg);
                            }
                        }
                        else {
                            echo "You are not a valid user of this system";
                        }
                    }
                ?>
                <a href="index.php">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>