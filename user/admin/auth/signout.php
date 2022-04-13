<?php 
    session_start();
    session_destroy();
    $base_url = 'http://localhost/poll(mod)/';
    //Redirect to login page
    header('Location: '.$base_url.'user/admin/auth/signin.php');
?>