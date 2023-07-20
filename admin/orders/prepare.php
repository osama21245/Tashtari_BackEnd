<?php

include "../../connect.php";

$userid = filterRequest("userid");
$orderid = filterRequest("orderid");
$ordertype = filterRequest("ordertype");


if($ordertype == "0"){$data = array(
    "orders_status" => 2
);}else{$data = array(
    "orders_status" => 4
);}



updateData("orders",$data,"orders_id = $orderid AND orders_status = 1");

if($ordertype == "0"){
    sendGCMDelivery("Info","There is a new order","delivery","","");
    insertNotify("Notfication","Your order is prepared",$userid ,"users$userid","","orderspendingUpdate");

}else{    insertNotify("Notfication","Your order has been delivered",$userid ,"users$userid","","orderspendingUpdate");
}


?>