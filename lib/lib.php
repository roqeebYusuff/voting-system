<?php
    $base_url = 'http://localhost/poll(mod)/';
    function executeQuery($cmdtext){
        $dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'poll';
	
		$conn = mysqli_connect($dbhost,$dbuser,$dbpass);

		if(! $conn){
			return null;
		}

		$sel = mysqli_select_db($conn, $dbname);

		if(!$sel){
			return null; 
		}
		
		$result = mysqli_query($conn, $cmdtext);
        if(!$result){
            print_r(mysqli_error($conn));
        }
        else{
            return $result;
        }
		mysqli_close($conn);
    }

    function redirect($url){
        header('Location: '.$url);
		exit;
    }

	function hashPassword($pass){
        $option = array('cost', 12);
        $data= password_hash($pass, PASSWORD_BCRYPT, $option);
        return $data;
    }

    function verifyPassword($pass, $hash){
        $verify = password_verify($pass, $hash);
        if($verify){
            return true;
        }
        return false;
    }

    function emailExists($email){
        $cmdtext = "SELECT * FROM voters WHERE  email = '$email'";

        $res = executeQuery($cmdtext);
        if(mysqli_num_rows($res) > 0)
        {
            return true;
        }
        return false;
    }