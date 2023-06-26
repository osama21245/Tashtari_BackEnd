<?php

include "./connect.php";

$id = filterRequest("id");
$rating = filterRequest("rating");
$note = filterRequest("note");

$data = array(
"orders_note" => $note,
"orders_rating" => $rating

);

updateData("orders",$data,"orders_id = $id");

?>