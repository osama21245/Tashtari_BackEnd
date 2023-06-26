<?php 

include "../connect.php";

$id = filterRequest("orderid");

deleteData("orders","orders_id = $id AND orders_status = 0");

?>