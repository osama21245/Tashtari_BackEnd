<?php

include "../../connect.php";

$itemname = filterRequest("name");
$itemnameAr = filterRequest("nameAr");
$items_descriptiom = filterRequest("description");
$items_decriptiom_ar = filterRequest("descriptionAr");
$item_count = filterRequest("count");
$itemactive = filterRequest("active");
$itemprice = filterRequest("price");
$itemdiscount = filterRequest("discount");
$itemdate = filterRequest("date");
 $itemscat = filterRequest("itemscat");
 $imagename = imageUpload("../../upload/items","files");

$data = array(
"items_name"=> $itemname,
"items_name_ar"=> $itemnameAr,
"items_image"=> $imagename,
 "items_descriptiom"=> $items_descriptiom,
"items_decriptiom_ar"=> $items_decriptiom_ar
,"items_count"=> $item_count,
"items_active"=> $itemactive,
"items_price"=> $itemprice
,"items_discount"=> $itemdiscount,
"items_date"=> $itemdate,
"itmes_cat"=> $itemscat
);

insertData("items",$data);

?>