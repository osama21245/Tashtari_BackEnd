<?php

include "../../connect.php";

$userid = filterRequest("userid");
$orderid = filterRequest("orderid");

$data = array(
    "orders_status" => 1
);

updateData("orders",$data,"orders_id = $orderid AND orders_status = 0");

sendGCM("success","your order has been approved","users$userid","","orderspendingUpdate");

?>