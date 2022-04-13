<?php 
    $base_url = 'http://localhost/poll(mod)/';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home - Roqvoty</title>
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/bootstrap/bootstrap.css">
    </head>

    <body style="background: #daddfc;">
        <div class="wrapper min-vh-100 d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column text-center gap-1">
                <a class="btn btn-dark" href="<?php echo $base_url ?>user/auth/signin.php">Sign in</a>
                <a class="btn btn-info" href="<?php echo $base_url ?>user/auth/signup.php">Sign up</a>
            </div>
        </div>
    </body>
</html>