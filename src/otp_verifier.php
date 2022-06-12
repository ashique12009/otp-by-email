<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>OTP Verifier</title>
</head>
<body>
    <div id="email-input-text-container" class="flex-container h-100vh">
        <div class="form-wrapper">
            
            <?php $msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';?>
            
            <?php if ($msg != '') : ?>
            <div><label><?php echo $msg;?></label></div>
            <?php endif; ?>

            <label>Enter your OTP to login:</label>
            <form action="process_otp.php" class="form" method="post">
                <input type="number" name="otp" id="otp" placeholder="OTP" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>