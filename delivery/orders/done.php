<?php

include "../../connect.php";

$userid = filterRequest("userid");
$orderid = filterRequest("orderid");

$data = array(
    "orders_status" => 4
);

insertNotify("Notfication","Your order has been delivered",$userid ,"users$userid","","orderspendingUpdate");
insertNotifyAdmin("Notfication","The order $orderid has been delivered ","admin","","ordersontheway");


updateData("orders",$data,"orders_id = $orderid AND orders_status = 3");

//sendGCM("success","your order has been approved","users$userid","","orderspendingUpdate");

?>