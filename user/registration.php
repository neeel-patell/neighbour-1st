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
    $address = str_replace("'","\'",$_POST['address']);
    $area = $_POST['area'];
    
    $date_of_birth = date("Y-m-d",strtotime($date_of_birth));
    $password = hash("sha256",$password);

    $query = "insert into consumer(first_name,last_name,mobile,email,password,gender,dob,address,area_id) values
    ('$first_name','$last_name',$mobile,'$email','$password',$gender,'$date_of_birth','$address',$area)";
    if($conn->query($query) == true){
        $image = $_POST['image'];
        $query = "select id from consumer where mobile = $mobile";
        $result = $conn->query($query);
        $row = $result->fetch_array();
        $id = $row['id'];
        $path = "../images/profile/consumer/$id.jpg";
        file_put_contents($path,base64_decode($image));
        echo json_encode(array("message"=>array("success"=>"Successfully Registered")));
    }
    else{
        echo json_encode(array("message"=>array("error"=>"Email or mobile already registered")));
    }
    

    
    
?>