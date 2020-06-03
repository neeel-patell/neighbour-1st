<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $product = $_POST['product'];
    $query = "SELECT id,name,price,quantity,description,weight,subcategory_id FROM product WHERE id=$product";
    $result = $conn->query($query);
    $row = $result->fetch_array();
    $query = "SELECT name from subcategory WHERE id=".$row['subcategory_id'];
    $result = $conn->query($query);
    $subcat = $result->fetch_array();
    
    array_push($data,array("id"=>$row['id'],"name"=>$row['name'],"price"=>$row['price'],"quantity"=>$row['quantity'],"description"=>$row['description'],"weight"=>$row['weight'],"subcategory"=>$subcat['name']));
    
    echo json_encode(array("data"=>$data));
?>