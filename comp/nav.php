<?php 
    session_start();
    include '../lib/lib.php';
    if(!isset($_SESSION['roqvotyUser'])){
        redirect($base_url.'/user/auth/signin.php');
    }
    else{
        $voterId = $_SESSION['roqvotyUser']['voter_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?> - Roqvoty</title>

        <link rel="stylesheet" href="<?php echo $base_url ?>assets/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/custom/css/main.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/fonts/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/fonts/feather/style.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/scroll/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/toast/iziToast.min.css">
    </head>
    <body>
        <header class="navbar">
            <div class="container">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <div class="logo">
                        <h2 class="brand-logo home m-0"><a href="<?php echo $base_url ?>user/dashboard.php">roqvoty</a></h2>
                    </div>

                    <div class="d-flex align-items-center dropdown">
                        <a class="py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo $base_url ?>/assets/img/avatarr.png" alt="User-Profile" style="height: 40px;" class="img-fluid avatar avatar-50 avatar-rounded">
                            <h6 class="username"><?php echo $_SESSION['roqvotyUser']['firstname'] ?></h6>
                            <i class="bi bi-chevron-down ms-1"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><h6 class="dropdown-header" href="#">Hello, <?php echo $_SESSION['roqvotyUser']['firstname'] ?></h6></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="javascript:logout();">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>