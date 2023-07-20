<?php

include "../../../connect.php";

$email = filterRequest("email"); 
$stmt = $con->prepare("SELECT * FROM delivery_users WHERE users_email = ? AND users_approve = 1  ");
$stmt->execute(array($email));
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();



if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}




?>