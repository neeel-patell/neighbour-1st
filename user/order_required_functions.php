<?php
    require_once '../connection.php';
    
    function delete_payment($id){
        $query = "DELETE FROM order_payment where id='$id'";
        $conn = getConn();
        if($conn->query($query)){
            return true;
        }
        else{
            return false;
        }
    }

    function delete_order($id){
        $query = "DELETE FROM `order` where id='$id'";
        $conn = getConn();
        if($conn->query($query)){
            return true;
        }
        else{
            return false;
        }
    }

    function delete_order_products($id){
        $query = "DELETE FROM `order_product` where order_id='$id'";
        $conn = getConn();
        if($conn->query($query)){
            return true;
        }
        else{
            return false;
        }
    }

    function delete_order_store($id){
        $query = "DELETE FROM `order_stores` where order_id='$id'";
        $conn = getConn();
        if($conn->query($query)){
            return true;
        }
        else{
            return false;
        }
    }

?>