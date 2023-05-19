<?php

include "../../connect.php";
 

$email = filterRequest("email"); 
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ?  ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
result($count) ; 
