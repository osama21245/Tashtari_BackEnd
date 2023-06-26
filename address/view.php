<?php
include "../connect.php";

$usersid = filterRequest("usersid");

getAllData("adress","address_usersid = $usersid")
?>