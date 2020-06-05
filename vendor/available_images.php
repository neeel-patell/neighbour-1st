<?php

    header('content-type: application/json');
    $data = array();
    $images = "";

    $id = $_POST['product'];
    $counter = 1;
    for($i=1 ; $i<=5 ; $i++){
        if(file_exists("../images/vendor/products/$id-$i.jpg") == true){
            array_push($data,array("image"=>$i));
        }
    }
    echo json_encode(array("data"=>$data));

?>