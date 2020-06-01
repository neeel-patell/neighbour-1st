<?php 
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();

    $data = array();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = explode(",",$_POST['image']);
    $quantity = $_POST['quantity'];
    $weight = $_POST['weight'];
    $store = $_POST['store'];
    $subcategory = $_POST['subcategory'];
    
    $query = "insert into product(name,description,price,quantity,weight,store_id,subcategory_id)
    values('$name','$description',$price,$quantity,$weight,$store,$subcategory)";
    
    if($conn->query($query) == true){
        $query = "select id from product where name='$name' and price=$price and store_id=$store and subcategory_id=$subcategory";
        $result = $conn->query($query);
        $row = $result->fetch_array();
        $id = $row['id'];
        $counter = 1;
        foreach($image as $img){
            file_put_contents("../images/vendor/products/$id-".($counter++).".jpg",base64_decode($img));
        }
        array_push($data,array("success"=>"Product Added Succcessfully"));
    }
    else{
        array_push($data,array("error"=>"Product not added"));
    }
    echo json_encode(array("message"=>$data));
?>