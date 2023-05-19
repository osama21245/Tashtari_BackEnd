<?php 

include "../connect.php";

$userid = filterRequest("userid");
$itemid = filterRequest("itemid");

$data = array( "favorite_usersid" => $userid ,
"favorite_itemid" => $itemid
) ; 

insertData("favorite", $data);