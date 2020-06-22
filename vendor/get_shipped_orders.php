<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $store = $_POST['store'];
    $query = "SELECT name,price,`order`.quantity,`order`.id'id',weight,user_id,`order`.created_at'date' FROM product join `order` WHERE product.id = `order`.product_id and product.store_id = $store and `order`.`status` = 1 order by `order`.created_at desc";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        $total = $row['price']*$row['quantity'];
        $query = "select first_name, last_name from login where id=".$row['user_id'];
        $date = date('dS F Y',strtotime($row['date']));
        $time = date('H:i A',strtotime($row['date']));
        $name = $conn->query($query);
        $name = $name->fetch_array();
        $name = $name['first_name']." ".$name['last_name'];
        array_push($data,array("name"=>$row['name'],"price"=>$row['price'],"quantity"=>$row['quantity'],"id"=>$row['id'],"total"=>$total,"username"=>$name,"date"=>$date,"time"=>$time));
    }

    echo json_encode(array("data"=>$data));
?>