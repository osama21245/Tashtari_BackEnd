<?php

include "./connect.php";

$userid = filterRequest("userid");
   
getAllData("notification","notification_usersid = $userid ORDER BY notification_id DESC")
?>