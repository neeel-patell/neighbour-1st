<?php
    header('content-type: application/json');
    $data = array();
    $image = str_replace("https://lampros.ml/neighbour-1st","..",$_POST['image']);

    if(unlink($image) == true){
        array_push($data,array("message"=>"Successfully Removed"));
    }
    else{
        array_push($data,array("message"=>"Something went wrong"));
    }

    echo json_encode(array("data"=>$data));
?>