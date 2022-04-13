<?php 
    include_once '../../lib/lib.php';
    if(isset($_GET['vote'])){
        $cmdtext = sprintf(
            "INSERT INTO %s (%s) values ('%s')",
            "votes",
            implode(", ", array_keys($_POST)),
            implode("', '", array_values($_POST))
        );

        $res = executeQuery($cmdtext);
        if($res){
            echo 'success';
        }
        else{
            echo $res;
        }
    }
?>