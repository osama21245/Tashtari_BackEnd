<?php
include "../../connect.php";

$id = filterRequest("id");
getAllData("ordersdetailsview","orders_id = $id");

?>