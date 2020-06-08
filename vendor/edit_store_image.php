<?php
    header('content-type: application/json');
    $data = array();

    if(isset($_POST['image']) == true && isset($_POST['store']) == true){
        $store = $_POST['store'];
        $image = $_POST['image'];

        if(file_put_contents("../images/vendor/store/$store.jpg",base64_decode($image)) == true){
            array_push($data,array("message"=>"Image Updated"));
        }
        else{
            array_push($data,array("message"=>"Image is not Updated"));
        }

        echo json_encode(array("data"=>$data));
    }

?>