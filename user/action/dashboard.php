<?php
    include_once '../../lib/lib.php';
    if(isset($_GET['fetch'])){
        $cmdt = 'SELECT * FROM nominees';
        $res = executeQuery($cmdt);

        $result = array();
        while($row = mysqli_fetch_assoc($res)){
            $result[] = $row;
        }

        echo json_encode($result);
    }
?>