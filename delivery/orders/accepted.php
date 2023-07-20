<?php 

include "../../connect.php";

$deliverymanID = filterRequest("deliveryman");

getAllData("ordersview","orders_status = 3 AND orders_deliveryman = $deliverymanID",null );


?>