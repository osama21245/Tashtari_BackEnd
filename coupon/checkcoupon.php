<?php
include "../connect.php";

$couponname = filterRequest("couponname");

$now = date("Y-m-d H:i:s");

getData("coupon","coupon_name = '$couponname' AND coupon_expiredate > '$now' AND coupon_count > 0")

?>