<?php 
    include_once '../../../lib/lib.php';
    if(isset($_GET['fvoters'])){
        $cmd = "SELECT * FROM nominees";
        $cmdtext = "SELECT * FROM voters";
        $n = executeQuery($cmd);
        $v = executeQuery($cmdtext);

        $nom = mysqli_num_rows($n);
        $vot = mysqli_num_rows($v);

        $res = array(
            'nominees' => $nom,
            'voters' => $vot
        );

        echo json_encode($res);
    }

    if(isset($_GET['type'])){
        $type = $_GET['type'];
        $cmdtext = "SELECT votes.nominee_id, nominees.fullname, count(*) AS counter FROM nominees INNER JOIN votes ON nominees.nominee_id = votes.nominee_id WHERE votes.type = '$type' GROUP BY votes.nominee_id";
        $res = executeQuery($cmdtext);

        $result = array();
        while($row = mysqli_fetch_assoc($res)){
            $result[] = $row;
        }

        echo json_encode($result);
    }

    if(isset($_GET['ntype'])){
        $type = $_GET['ntype'];
        $cmdtext = "SELECT * from nominees WHERE `type` = '$type'";
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