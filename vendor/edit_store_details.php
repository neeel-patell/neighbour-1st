<?php
    header('content-type: application/json');
    $data = array();
    include '../connection.php';
    $conn = getConn();

    $store = $_POST['store'];
    $name = $_POST['name'];
    $website = $_POST['website'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $category = $_POST['category'];

    $query = "select id from category where name='$category'";
    $result = $conn->query($query);
    $category = $result->fetch_array();
    $category = $category['id'];

    $query = "UPDATE store
              SET name='$name', website='$website', email='$email', category_id=$category, mobile=$mobile
              WHERE id=$store";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Data Updated"));
    }
    else{
        array_push($data,array("message"=>"Number is already associated with other Store"));
    }
    
    echo json_encode(array("data"=>$data));

?>