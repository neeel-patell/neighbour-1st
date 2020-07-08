<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $area = $_POST['area'];
    $category = $_POST['category'];
    $query = "select id,name from store where area_id=$area and category_id=$category";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        $image = base64_encode(file_get_contents("../images/vendor/store/".$row['id'].".jpg"));
        array_push($data,array("id"=>$row['id'],"name"=>$row['name'],"image"=>$image));
    }

    echo json_encode(array("data"=>$data));
?>