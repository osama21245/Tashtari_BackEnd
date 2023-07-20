<?php 

include "../../connect.php";

$deliverymanID = filterRequest("deliveryman");

getAllData("ordersview","1=1 AND orders_status = 4 AND orders_deliveryman = $deliverymanID ",null )

?>