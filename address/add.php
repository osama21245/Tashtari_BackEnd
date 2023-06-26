<?php
include "../connect.php";

$addressusersid = filterRequest("addressusersid");
$addressname = filterRequest("addressname");
$adresscity = filterRequest("adresscity");
$adressStreet = filterRequest("adressStreet");




$data = array(
    "address_usersid" => $addressusersid,
 "address_name"  =>  $addressname ,
   "address_city" => $adresscity ,
   "address_street"=> $adressStreet  ,
    
    
);
insertData("adress",$data)
?>