<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Email OTP</title>
</head>
<body>
    <div id="email-input-text-container" class="flex-container h-100vh">
        <div class="form-wrapper">
            <label>Get OTP in E-mail</label>
            <form action="process.php" class="form" method="post">
                <input type="email" name="email" id="email" placeholder="E-mail Address" required>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>