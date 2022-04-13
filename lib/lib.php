<?php

    $base_url = 'http://localhost/poll(mod)/';
    //Messages
    $room_create_success = "Room was added successfully";
    $room_create_error = "Unable to add room";
    $room_edit_success = "Room was edited successfully";
    $room_edit_error = "Unable to edit room";
    $room_delete_success = "Room deleted successfully";
    $room_delete_error = "Unable to delete room";

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

?>