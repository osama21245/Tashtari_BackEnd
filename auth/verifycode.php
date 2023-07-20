<?php  

include "../connect.php";

$usersemail = filterRequest("email");
$verifycode = filterRequest("verifycode");

$data = array("users_approve" => "1");

updateData("users",$data,"users_verifycode = $verifycode",true);



?>