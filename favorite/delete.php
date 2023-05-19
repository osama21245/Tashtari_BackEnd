<?php 

include "../connect.php";

$userid = filterRequest("userid");
$itemid = filterRequest("itemid");



deleteData("favorite", "favorite_usersid = $userid AND favorite_itemid = $itemid"
);