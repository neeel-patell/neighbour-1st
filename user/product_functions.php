<?php
    require_once '../connection.php';
    
    function update_product($product_id,$quantity){
        $conn = getConn();
        if($conn->query("UPDATE product SET quantity = quantity - $quantity WHERE id=$product_id") == true){
            return true;
        }
        else{
            return false;
        }
    }
?>