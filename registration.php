<?php 
    header('content-type: application/json');
    include 'connection.php';
    $conn = getConn();
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $date_of_birth = str_replace("/","-",$date_of_birth);
    $address = $_POST['address'];
    $area = $_POST['area'];
    $user_type = $_POST['user_type'];
    
    $date_of_birth = date("Y-m-d",strtotime($date_of_birth));
    $password = hash("sha256",$password);
    
    $query = "insert into login(first_name,last_name,mobile,email,password,gender,date_of_birth,address,area_id,user_type) values
    ('$first_name','$last_name',$mobile,'$email','$password',$gender,'$date_of_birth','$address',$area,$user_type)";
    if($conn->query($query) == true){
        $image = $_POST['image'];
        $query = "select id from login where mobile = $mobile";
        $result = $conn->query($query);
        $row = $result->fetch_array();
        $id = $row['id'];
        $path = "images/profile/$id.jpg";
        file_put_contents($path,base64_decode($image));
        echo json_encode(array("message"=>array("success"=>"Successfully Registered")));
    }
    else{
        echo json_encode(array("message"=>array("error"=>"Email or mobile registered")));
    }
    
?>