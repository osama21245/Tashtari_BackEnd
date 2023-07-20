<?php

include "../../connect.php";

$userid = filterRequest("userid");
$orderid = filterRequest("orderid");
$deliveryid = filterRequest("deliveryid");

$data = array(
    "orders_status" => 3,
    "orders_deliveryman" => $deliveryid
);

insertNotify("Notfication","Your order is on the way",$userid ,"users$userid","","orderspendingUpdate");

updateData("orders",$data,"orders_id = $orderid AND orders_status = 2");

sendGCMDelivery("Warning","The order has been accepted by a Delivery Man $deliveryid","delivery","","orderspendingUpdate");
insertNotifyAdmin("Notfication","The order has been accepted by a Delivery Man $deliveryid","admin","","orderspendingUpdate");

?>