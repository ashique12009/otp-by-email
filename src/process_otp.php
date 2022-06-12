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
                    require_once '../vendor/autoload.php';

                    use OTPAPP\Otp_Provider;
                    use OTPAPP\Database;

                    $otp = $_POST['otp'];

                    if ($otp < 1) {
                        echo 'OTP cannot be less than 1';
                    }
                    else {
                        // Check this email is in our system or not
                        $db = new Database();
                        $otp_checker_result = $db->is_otp_expired($otp);

                        if ($otp_checker_result) {
                            echo "You are not a valid user of this system";
                        }
                        else {
                            $msg = 'otp verification done';
                            header("Location: profile.php?msg=".$msg);
                        }
                    }
                ?>
                <a href="index.php">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>