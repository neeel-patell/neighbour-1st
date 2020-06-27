<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $user = $_POST['id'];
    $query = "select id,name,category_id from store where user_id=$user";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        $image = base64_encode(file_get_contents("../images/vendor/store/".$row['id'].".jpg"));
        $query = "select service from category where id=".$row['category_id'];
        $cat = $conn->query($query);
        $cat = $cat->fetch_array();
        if($cat['service'] == 0){
            array_push($data,array("id"=>$row['id'],"name"=>$row['name']."(Store)","image"=>$image));
        }
        else{
            array_push($data,array("id"=>$row['id'],"name"=>$row['name']."(Service)","image"=>$image));
        }
    }

    echo json_encode(array("data"=>$data));
?>