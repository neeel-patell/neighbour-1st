<?php
    header('content-type: application/json');
    require_once '../connection.php';
    $conn = getConn();
    $data = array();

    $mobile = $_POST['mobile'];
    $result = $conn->query("SELECT id FROM consumer where mobile=$mobile");
    if(mysqli_num_rows($result) == 0){
        array_push($data,array("exist"=>0));
    }
    else{
        array_push($data,array("exist"=>1));
    }
    echo json_encode(array("data"=>$data));
?>