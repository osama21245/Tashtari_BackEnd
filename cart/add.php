<?php 

include "../connect.php";

$userid = filterRequest("userid");
$itemid = filterRequest("itemid");

$count = getData("cart","cart_itemid = $itemid AND cart_usersid = $userid AND cart_orders = 0",null,false);

 $data = array( "cart_usersid" => $userid ,
"cart_itemid" => $itemid
) ; 

insertData("cart", $data);

?>