<?php 
    session_start();
    session_destroy();
    $base_url = 'http://localhost/poll(mod)/';
    
    header('Location: '.$base_url.'user/auth/signin.php');
?>