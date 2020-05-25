<?php 
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image1 = $_POST['image1'];
    $image2 = $_POST['image2'];
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
        file_put_contents("../images/vendor/products/$id-1.jpg",base64_decode($image1));
        file_put_contents("../images/vendor/products/$id-2.jpg",base64_decode($image2));
        echo json_encode(array("message"=>array("success"=>"Product Added Succcessfully")));
    }
    
?>