<?php
include "../connect.php";

$addressid = filterRequest("addressid");
$addressname = filterRequest("addressname");
$adresscity = filterRequest("adresscity");
$adressStreet = filterRequest("adressStreet");



$data = array(
    
 "address_name"  =>  $addressname ,
   "address_city" => $adresscity ,
   "address_street"=> $adressStreet  ,
    
);
updateData("adress",$data,"address_id = $addressid")
?>