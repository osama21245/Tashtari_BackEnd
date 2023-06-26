<?php
include "../connect.php";

$addressid = filterRequest("addressid");



deleteData("adress","address_id = $addressid")
?>