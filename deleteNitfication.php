<?php

include "./connect.php";

$userid = filterRequest("userid");

deleteData("notification","notification_usersid = $userid");