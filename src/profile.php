<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Profile</title>
</head>
<body>
    <div id="email-input-text-container" class="flex-container h-100vh">
        <div class="form-wrapper">
            <?php 
                $msg = $_REQUEST['msg']; 
                if ($msg != 'otp verification done')
                    header("Location: index.php");
            ?>

            <label>Welcome to your profile</label>            
        </div>
    </div>
</body>
</html>