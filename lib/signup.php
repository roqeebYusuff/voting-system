<?php 
    include './lib.php';

    $message = '';
    // echo 'got here first';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $checkemail = emailExists($_POST['email']);
        if($checkemail){
            echo 'Email is already being used';
        }
        else{
           //hash password
            $_POST['password'] = hashPassword($_POST['password']);

            unset($_POST['conpassword']);
            $cmdtext = sprintf(
                "INSERT INTO %s (%s) values ('%s')",
                "voters",
                implode(", ", array_keys($_POST)),
                implode("', '", array_values($_POST))
            );

            $result = executeQuery($cmdtext);
            
            if($result)
            {
                echo 'success';
            }
            else
            {
                echo 'error';
            }
        }
    }
?>