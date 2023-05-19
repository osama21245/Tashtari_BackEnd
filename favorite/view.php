<?php

include "../connect.php";
$userid = filterRequest("userid");

getAllData("myfavorite","favorite_usersid = ? ",array($userid));

