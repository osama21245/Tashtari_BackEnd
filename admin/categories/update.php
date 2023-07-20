<?php 

include "../../connect.php";

$catid =filterRequest("catid");
$catname = filterRequest("catname");
$catnameAr = filterRequest("catnameAr");
$imagename = imageUpload("../../upload/categories","files");
$imageold = filterRequest("imageold");

if($imagename == "empty"){
    $data =array(
        "categories_name"=> $catname,
        "categories_name_ar"=> $catnameAr
        );
}else{
    deleteFile("../../upload/categories",$imageold);
    $data =array(
        "categories_name"=> $catname,
        "categories_name_ar"=> $catname
        ,"categories_image"=> $imagename         
        );
}

updateData("categories",$data,"categories_id = $catid")


?>