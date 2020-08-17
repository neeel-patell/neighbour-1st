<?php
    header('content-type: application/json');
    $data = array();
    require '../connection.php';
    $conn = getConn();

    $user = $_POST['user'];

    $result = $conn->query("SELECT id,product_id,quantity from cart where user_id=$user ORDER BY created_at DESC");
    while($row = $result->fetch_array()){
        $product = $conn->query("SELECT name,price,weight from product where id=".$row['product_id']);
        $product = $product->fetch_array();
        for($i=1;$i<=5;$i++){
            if(file_exists("../images/vendor/products/".$row['product_id']."-$i.jpg")){
                $image = base64_encode(file_get_contents("../images/vendor/products/".$row['product_id']."-$i.jpg"));
                break;
            }
        }
        array_push($data,array("id"=>$row['id'],"product_name"=>$product['name'],"price"=>$product['price'],"weight"=>$product['weight'],"quantity"=>$row['quantity'],"image"=>$image));
    }

    echo json_encode(array("data"=>$data));
?>