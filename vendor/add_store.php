<?php 
    header('content-type: application/json');
    require '../connection.php';
    require '../mail/mail_sender.php';
    $conn = getConn();
    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    $area = $_POST['area'];
    $user = $_POST['user'];
    $subcategory = $_POST['subcategory'];
    $query = "insert into store(name,address,category_id,area_id,user_id) values ('$name','$address',$category,$area,$user)";
    
    if($conn->query($query) == true){
        $query = "select id from store where name='$name' and address='$address' and user_id=$user";
        $result = $conn->query($query);
        $row = $result->fetch_array();
        $store = $row['id'];
        foreach($subcategory as $data){
            $query = "insert into store_subcategory(store_id,subcategory_id) values($store,$data)";
            if($conn->query($query) == false){
                $f = 0;
            }
        }
    }
    else{
        $f = 0;
    }
    
    if($f = 0){
        echo json_encode(array("message"=>array("error"=>"Store has not registered")));
    }
    else{
        $image = $_POST['image'];
        file_put_contents("../images/vendor/store/$store.jpg",base64_decode($image));
        echo json_encode(array("message"=>array("success"=>"Store has been registered")));
    }
?>