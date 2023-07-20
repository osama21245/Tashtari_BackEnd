<?php

include "../../../connect.php";
 
$verfiycode= rand(10000,99999);
$email = filterRequest("email"); 
$id = filterRequest("userid");
$stmt = $con->prepare("SELECT * FROM `admin` WHERE users_email = ? AND users_approve = 1  ");
$stmt->execute(array($email));
$count = $stmt->rowCount();

$data2 = array(
    "users_verifycode" => $verfiycode ,
);

if ($count > 0) {
    sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verfiycode") ; 
    updateData("admin" , $data2,"users_id=$id",true);
} else {
    echo json_encode(array("status" => "failure"));
}




?>