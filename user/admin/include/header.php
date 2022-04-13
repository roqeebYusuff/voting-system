<?php 
    session_start();
    include '../../lib/lib.php';

    if(!isset($_SESSION['roqvotyAdmin'])){
        redirect($base_url.'/user/admin/auth/signin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?> | Roqvoty Admin</title>

        <link rel="stylesheet" href="<?php echo $base_url ?>assets/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/custom/css/admin.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/fonts/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/fonts/feather/style.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/scroll/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/toast/iziToast.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/datatable/datatables.min.css">
    </head>
    <body>
        <div id="preloader">
            <div class="load"></div>
        </div>
        <header class="navbar">
            <div class="container">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <div class="logo">
                        <h2 class="brand-logo home m-0">roqvoty</h2>
                    </div>

                    <div class="d-flex align-items-center dropdown">
                        <a class="py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo $base_url ?>assets/img/avatarr.png" alt="User-Profile" style="height: 40px;" class="img-fluid avatar avatar-50 avatar-rounded">
                            <h6 class="username">Admin</h6>
                            <i class="bi bi-chevron-down ms-1"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><h6 class="dropdown-header" href="#">Hello, Admin</h6></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo $base_url ?>user/admin/auth/signout.php">Logout</a></li>
                        </ul>

                        <div class="mobile-toggle ms-4">
                            <i class="ft-menu"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="main-content">
            <nav class="sidebar shadow">
                <ul>
                    <li class="sidebar-item <?php if($title == 'Dashboard') { echo 'active'; } ?>">
                        <a class="sidebar-link" href="<?php echo $base_url ?>user/admin">
                            <i class="ft-file-minus"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item <?php if($title == 'Nominees') { echo 'active'; } ?>">
                        <a class="sidebar-link" href="<?php echo $base_url ?>user/admin/nominees.php">
                            <i class="ft-users"></i>
                            <span>Nominees</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item <?php if($title == 'Voters') { echo 'active'; } ?>">
                        <a class="sidebar-link" href="<?php echo $base_url ?>user/admin/voters.php">
                            <i class="ft-user"></i>
                            <span>Voters</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="main-wrapper">