<?php 
    include_once '../../../lib/lib.php';
    if(isset($_GET['voter'])){
        $cmdtext = "SELECT * from voters";
        $r = executeQuery($cmdtext);

        $count = mysqli_num_rows($r);

        $result = array(
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => array()
        );
        while($row = mysqli_fetch_array($r)){
            $result["aaData"][] = $row;
        }
        
        echo json_encode($result);
    }
?>