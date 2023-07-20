<?php
include "../../connect.php";

$userstatus = filterRequest("userStatus");
$userid = filterRequest("id");

if($userstatus == "1"){

    $data = array("users_approve" => "2");
    updateData("users",$data,"users_id = $userid");
} else if($userstatus == "2"){
    
    $data = array("users_approve" => "1");
    updateData("users",$data,"users_id = $userid");
}else{         
       echo json_encode(array("status" => "failure"));
}
?>