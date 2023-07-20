<?php  

include "../../../connect.php";

$userid = filterRequest("userid");
$verifycode = filterRequest("verifycode");


getAllData("delivery_users","users_verifycode = $verifycode AND users_id = $userid");



?>