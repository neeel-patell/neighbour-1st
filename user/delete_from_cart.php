<?php
    header('content-type: application/json');
    $data = array();
    include 'delete_cart_item.php';
    $item = $_POST['cart'];
    
    if(delete_cart_item($item) == true){
        array_push($data,array("message"=>"Item(s) Deleted"));
    }
    else{
        array_push($data,array("message"=>"Item(s) not Deleted"));
    }

    echo json_encode(array("data"=>$data));
?>