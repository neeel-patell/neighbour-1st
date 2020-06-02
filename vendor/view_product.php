<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $store = $_POST['store'];
    $subcat = $_POST['subcategory'];
    $query = "SELECT id,name,price,quantity,description,weight FROM product WHERE store_id=$store AND subcategory_id=$subcat";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        array_push($data,array("id"=>$row['id'],"name"=>$row['name'],"price"=>$row['price'],"quantity"=>$row['quantity'],"description"=>$row['description'],"weight"=>$row['weight']));
    }

    echo json_encode(array("data"=>$data));
?>