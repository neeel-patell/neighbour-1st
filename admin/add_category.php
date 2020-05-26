<?php 
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    
    $name = $_POST['name'];
    $image = $_POST['image'];
    $service = $_POST['service'];
    
    $query = "insert into category(name,service) values('$name','$service')";
    if($conn->query($query) == true){
        $query = "select id from category where name='$name' and service=$service";
        $result = $conn->query($query);
        $row = $result->fetch_array();
        $id = $row['id'];
        file_put_contents("../images/admin/category/$id.jpg",base64_decode($image));
        echo json_encode(array("message"=>array("success"=>"Category Added Successfully")));
    }
?>