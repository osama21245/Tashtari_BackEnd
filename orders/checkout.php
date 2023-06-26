<?php 

include "../connect.php";

$usersid = filterRequest("usersid");
$orderaddress = filterRequest("ordersaddress");
$ordertype = filterRequest("orderstype");
$pricedelivery = filterRequest("pricedelivery");
$orderprice = filterRequest("ordersprice");
$orderspiceBeforeDiscount = filterRequest("orders_priceBe");
$ordercoupon = filterRequest("orderscoupon");
$orderpaymenttype = filterRequest("orderspaymenttype");

if($ordertype == 1){
    $pricedelivery = 0.0;
}

$totlaprice = $orderprice + $pricedelivery;


$now = date("Y-m-d H:i:s");

$count2= getData("coupon","coupon_id = '$ordercoupon' AND coupon_expiredate > '$now' AND coupon_count > 0",null,false);

if($count2>0){
// $data3 =array("coupon_count" => "coupon_count - 1" );
//     updateData("coupon",$data3,"coupon_id = $ordercoupon");
   
$stmt = $con->prepare("UPDATE coupon SET coupon_count = coupon_count -1 WHERE coupon_id = $ordercoupon ");
// $stmt = $con->prepare("UPDATE `coupon` SET `coupon_count`='coupon_count' - 1  WHERE coupon_id = '$ordercoupon`  ");
    $stmt->execute();
}

$data = array("orders_usersid" => $usersid,
"orders_address" => $orderaddress,
"orders_type" => $ordertype,
"orders_price" => $orderspiceBeforeDiscount,
"orders_pricedelivery" => $pricedelivery,
"orders_totalprice" => $totlaprice,
"orders_coupon" => $ordercoupon,
"orders_paymenttype" => $orderpaymenttype,
);

$count = insertData("orders",$data,false);

if($count>0){

    $stmt = $con->prepare("SELECT MAX(orders_id) FROM orders");
    $stmt->execute();
    $maxid = $stmt->fetchColumn();

    $data2 = array( "cart_orders" => $maxid );

    updateData("cart",$data2 , "cart_usersid = $usersid AND cart_orders = 0");

}




?>