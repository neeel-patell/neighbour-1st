<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $store = $_POST['store'];
    $query = "select name,address,area_id,email,website,mobile,category_id from store where id=$store";
    $result = $conn->query($query);
    
    if(mysqli_num_rows($result) != 0){
        $row = $result->fetch_array();

        $area = $conn->query("select name,pincode,city_id from area where id=".$row['area_id']);
        $area = $area->fetch_array();

        $city = $conn->query("select name,state_id from city where id=".$area['city_id']);
        $city = $city->fetch_array();

        $state = $conn->query("select name from state where id=".$city['state_id']);
        $state = $state->fetch_array();

        $category = $conn->query("select name from category where id=".$row['category_id']);
        $category = $category->fetch_array();
    
        $address = $row['address'].", ".$area['name'].", ".$city['name'].", ".$state['name']." - ".$area['pincode'];

        $image = base64_encode(file_get_contents("../images/vendor/store/$store.jpg"));
        array_push($data,array("message"=>"Data Found","name"=>$row['name'],"address"=>$address,"email"=>$row['email'],"website"=>$row['website'],"mobile"=>$row['mobile'],"category"=>$category['name'],"image"=>$image));
    
    }
    else{
        array_push($data,array("message"=>"Data not Found"));
    }
    echo json_encode(array("data"=>$data));
?>