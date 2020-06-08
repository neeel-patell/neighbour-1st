<?php
    header('content-type: application/json');
    $data = array();
    $image = "../images/vendor/products/".$_POST['filename'].".jpg";
    
    if(unlink($image) == true){
        array_push($data,array("message"=>"Successfully Removed"));
    }
    else{
        array_push($data,array("message"=>"Something went wrong"));
    }

    echo json_encode(array("data"=>$data));
?>