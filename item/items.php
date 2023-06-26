<?php
 include "../connect.php" ;

  $catid = filterRequest("id");

 //getAllData("itemsview","categories_id=$catid");

   $userid = filterRequest("usersid");

   $stmt = $con->prepare("SELECT items1view.* , 1 as favorite , (items_price - (items_price * items_discount / 100)) as itemspricediscount FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemid = items1view.items_id AND favorite.favorite_usersid = $userid
WHERE categories_id = $catid
UNION ALL 
SELECT *  , 0 as favorite ,(items_price - (items_price * items_discount / 100)) as itemspricediscount FROM items1view
WHERE categories_id = $catid AND  items_id NOT IN  ( SELECT items1view.items_id FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemid = items1view.items_id AND favorite.favorite_usersid = $userid  )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
?>