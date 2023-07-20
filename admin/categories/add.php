<?php

include "../../connect.php";

$catname = filterRequest("catname");
$catnameAr = filterRequest("catnameAr");
$imagename = imageUpload("../../upload/categories","files");

$data = array(
"categories_name"=> $catname,
"categories_name_ar"=> $catnameAr
,"categories_image"=> $imagename


    
);

insertData("categories",$data);

?>