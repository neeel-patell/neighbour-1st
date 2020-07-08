<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $product = $_POST['product'];
    $query = "SELECT id,name,price,description,weight,subcategory_id FROM product WHERE id=$product";
    $result = $conn->query($query);
    $row = $result->fetch_array();
    $weight = $row['weight'];
    if($weight > 1){
        $kg = (int)$weight;
        $gr = $weight[-3].$weight[-2].$weight[-1];
        $weight = "$kg Kilo $gr Grams";
    }
    else{
        $weight = strval($weight);
        $weight[0] = $weight[1] = " ";
        $weight = trim($weight)." G";
    }
    
    array_push($data,array("id"=>$row['id'],"name"=>$row['name'],"price"=>$row['price'],"description"=>$row['description'],"weight"=>$weight));
    
    echo json_encode(array("data"=>$data));
?>