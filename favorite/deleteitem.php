<?php 

include "../connect.php";

$id = filterRequest("favid");




deleteData("favorite", "favorite_id = $id "
);