<?php

include "../connect.php" ;

$userid = filterRequest("userid");
$itemid = filterRequest("itemid");

$stmt = $con->prepare("SELECT count(cart.cart_id) as countitems FROM `cart` WHERE cart_usersid = $userid AND cart_itemid = $itemid AND cart_orders = 0 ");
$stmt->execute();
$count = $stmt->rowCount();
$data = $stmt->fetchColumn();

if($count>0){

    echo json_encode(array("status" => "success " , "data" => $data));

}else{
    echo json_encode(array("status" => "success " , "data" => "0"));

}
