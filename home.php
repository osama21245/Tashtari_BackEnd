<?php

include "connect.php";

$alldata = array();
$alldata["status"] = "success";


$categories = getAllData("categories",null,null,false);

$alldata["categories"] = $categories;

$settings = getAllData("settings",null,null,false);

$alldata["settings"] = $settings;




$items = getAllData("itemstopselling","1 = 1 ORDER BY countitems DESC",null,false);

$alldata["items"] = $items;


echo json_encode($alldata)

?>
