<?php 

include "../connect.php";

$userid = filterRequest("userid");
$itemid = filterRequest("itemid");



deleteData("cart", "cart_id = (SELECT cart_id FROM cart WHERE cart_usersid = $userid AND cart_itemid = $itemid AND cart_orders = 0 LIMIT 1) "
);