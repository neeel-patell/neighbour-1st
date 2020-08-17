<?php
    require '../connection.php';

    function delete_cart_item($id){
        $conn = getConn();
        $query = "DELETE from cart where id=$id";
        if($conn->query($query) == true){
            return true;
        }
        else{
            return false;
        }
    }
?>