<?php

include "../../connect.php";

$catid = filterRequest("catid");
$imageold = filterRequest("oldimage");

deleteFile("../../upload/categories",$imageold);

deleteData("categories","categories_id = $catid");

?>