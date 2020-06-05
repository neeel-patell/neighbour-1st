<?php
    header('content-type: application/json');
    $data = array();
    
    $image = $_POST['image'];
    $id = $_POST['product'];
    
    $f = 0;

    for($i=1; $i<=5; $i++){
        if(file_exists("../images/vendor/products/$id-$i.jpg") == false){
            if(file_put_contents("../images/vendor/products/$id-$i.jpg",base64_decode($image)) == true){
                $f = 1;
                break;
            }
        }
    }

    if($f == 1){
        array_push($data,array("message"=>"Image added"));
    }
    else{
        array_push($data,array("message"=>"You can Add only five images for a product"));
    }

    echo json_encode(array("data"=>$data));
?>