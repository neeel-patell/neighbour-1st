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
    $images = array();
    for($i=1 ; $i<=5 ; $i++){
        if(file_exists("../images/vendor/products/$product-$i.jpg") == true){
            $image = base64_encode(file_get_contents("../images/vendor/products/$product-$i.jpg"));
            array_push($images,$image);
        }
    }
    array_push($data,array("id"=>$row['id'],"name"=>$row['name'],"price"=>$row['price'],"description"=>$row['description'],"weight"=>$weight,"images"=>$images));
    
    echo json_encode(array("data"=>$data));
?>