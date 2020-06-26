<?php
    header('content-type: application/json');
    require '../connection.php';
    $data = array();
    $conn = getConn();

    $user = $_POST['user'];
    $line1 = $_POST['line1'];
    $line2 = $_POST['line2'];
    $mobile = $_POST['mobile'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $area = $_POST['area'];

    $query = "INSERT into user_address(first_name,last_name,line1,line2,mobile,area_id,user_id) values('$first_name','$last_name','$line1','$line2',$mobile,$area,$user)";
    if($conn->query($query) == true){
        array_push($data,array("message"=>"Address has been Added"));
    }
    else{
        array_push($data,array("message"=>"Address has not Added"));
    }

    echo json_encode(array("data"=>$data));
?>