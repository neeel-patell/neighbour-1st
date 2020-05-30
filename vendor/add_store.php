<?php 
    header('content-type: application/json');
    require '../connection.php';
    require '../mail/mail_sender.php';
    $conn = getConn();
    $res = array();
    
    $f = 1;
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    
    if($subcategory[strlen($subcategory)-1] === ","){
		$subcategory[strlen($subcategory)-1] = " ";
		$subcategory = rtrim($subcategory);
	}
	$subcategory = explode(",",$subcategory);
    
    $area = $_POST['area'];
    $user = $_POST['user'];
    $query = "insert into store(name,address,mobile,email,website,category_id,area_id,user_id) values ('$name','$address',$mobile,'$email','$website',$category,$area,$user)";
    
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
    
    if($f == 0){
        array_push($res,array("error"=>"Phone number or Email already used for another store"));

    }
    else{
        $image = $_POST['image'];
        file_put_contents("../images/vendor/store/$store.jpg",base64_decode($image));
        array_push($res,array("success"=>"Store has been registered"));
    }
    echo json_encode(array("message"=>$res));
?>