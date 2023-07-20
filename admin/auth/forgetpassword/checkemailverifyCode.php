<?php  

include "../../../connect.php";

$userid = filterRequest("userid");
$verifycode = filterRequest("verifycode");


getAllData("admin","users_verifycode = $verifycode AND users_id = $userid");



?>