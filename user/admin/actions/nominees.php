<?php 
    include_once '../../../lib/lib.php';
    if(isset($_GET['nominee'])){
        $cmdtext = "SELECT * from nominees";
        $r = executeQuery($cmdtext);

        $count = mysqli_num_rows($r);

        // $res = mysqli_fetch_all($r);

        $result = array(
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => array()
        );
        while($row = mysqli_fetch_array($r)){
            $result["aaData"][] = $row;
        }
        
        // print_r($res);
        // echo json_encode(array("aaData" => $res));
        echo json_encode($result);
    }

    if(isset($_GET['addnominee'])){
        $cmdtext = sprintf(
            "INSERT INTO %s (%s) values ('%s')",
            "nominees",
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