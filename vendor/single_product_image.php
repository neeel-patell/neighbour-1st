<?php
    header('content-type: application/json');
    $data = array();

    $product = $_POST['product'];

    for($i=1 ; $i<=5 ; $i++){
        if(file_exists("../images/vendor/products/$product-$i.jpg") == true){
            $image = base64_encode(file_get_contents("../images/vendor/products/$product-$i.jpg"));
            array_push($data,array("filename"=>"$product-$i","image"=>$image));
        }
    }

    echo json_encode(array("data"=>$data));

?>