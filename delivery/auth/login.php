<?php

include "../../connect.php";
 
$password = sha1($_POST['password']);
$email = filterRequest("email"); 
// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND  users_password = ? AND users_approve = 1 ");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();
// result($count) ; 

getData("delivery_users" , "users_email = ? AND  users_password = ? AND users_approve != 0 " , array($email , $password)) ; 