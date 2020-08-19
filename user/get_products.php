<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $store = $_POST['store'];
    $subcat = $_POST['subcategory'];
    $query = "SELECT id,name,price,weight FROM product WHERE store_id=$store AND subcategory_id=$subcat AND quantity>0 AND visibility=1";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        $weight = $row['weight'];
        if($weight > 1){
            $weight = (float)$weight;
            $weight = $weight." KG";
        }
        else{
            $weight = strval($weight);
            $weight[0] = $weight[1] = " ";
            $weight = trim($weight)." G";
        }
        for($i=1; $i<=5; $i++){
            if(file_exists("../images/vendor/products/".$row['id']."-$i.jpg")){
                $image = base64_encode(file_get_contents("../images/vendor/products/".$row['id']."-$i.jpg"));
                break;
            }
        }
        array_push($data,array("id"=>$row['id'],"name"=>$row['name']."($weight)","price"=>$row['price'],"image"=>$image));
    }

    echo json_encode(array("data"=>$data));
?>