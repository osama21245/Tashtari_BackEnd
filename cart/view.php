<?php

include "../connect.php";

$userid = filterRequest("userid");

 function GetDataCart($userid){
    global $con;
    $data = array();
    $stmt= $con->prepare("SELECT *  FROM  cartitems WHERE cart_usersid = $userid ");

   //$stmt= $con->prepare("SELECT * , (itemsprice - (itemsprice * items_discount / 100)) as itemspricediscount FROM  cartitems WHERE cart_usersid = $userid ");

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($count > 0) {
        return array("status" => "success", "data" => $data);
      } else {
         return array("status" => "failure");
     }}


$data2 = GetDataCart($userid);
  //getAllData("cartitems","cart_usersid = $userid",null,false);

$stmt= $con->prepare("SELECT SUM(itemsprice) as totalprice ,  SUM(countitems) as totalcount FROM cartitems WHERE cartitems.cart_usersid = $userid GROUP BY cart_usersid ");

$stmt->execute();
$datacountandprice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(array("status" => "success",
    "datacart"=>$data2, 
    "countprice"=>$datacountandprice ));