<?php

include "../../connect.php";

$userid = filterRequest("userid");
$orderid = filterRequest("orderid");

$data = array(
    "orders_status" => 1
);

insertNotify("Notfication","Your order has been approved",$userid ,"users$userid","","orderspendingUpdate");

updateData("orders",$data,"orders_id = $orderid AND orders_status = 0");

//sendGCM("success","your order has been approved","users$userid","","orderspendingUpdate");

?>