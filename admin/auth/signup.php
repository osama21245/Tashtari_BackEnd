<?php

include "../../connect.php";

$username = filterRequest("username");
$password = sha1($_POST["password"]);
$email = filterRequest("email");
$phone = filterRequest("phone");
$verfiycode     = rand(10000 ,99999 );

$stmt = $con->prepare("SELECT * FROM `admin` WHERE users_email = ? OR users_phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
$data = array(
    "users_name" => $username,
    "users_password" =>  $password,
    "users_email" => $email,
    "users_phone" => $phone,
    "users_verifycode" => $verfiycode ,
);
if ($count > 0) {
    $stmt = $con->prepare("SELECT * FROM `admin` WHERE (users_email = ? AND users_phone = ?) AND users_approve = '0' ");
    $stmt->execute(array($email, $phone));
    $count2 = $stmt->rowCount(); 
    $data2=array("users_verifycode"=>$verfiycode,"users_name" => $username,
    "users_password" =>  $password,);
      if($count2>0){
        sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verfiycode") ; 
        updateData("admin",$data2,"users_phone = $phone");

   }else{printFailure("PHONE OR EMAIL IS ALREADY EXIST");
   }
    
} else {

    
    sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verfiycode") ; 
    insertData("admin" , $data,) ; 

}