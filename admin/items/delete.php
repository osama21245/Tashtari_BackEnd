



<?php

include "../../connect.php";

$itemid = filterRequest("itemid");
$imageold = filterRequest("oldimage");

deleteFile("../../upload/items",$imageold);

deleteData("items","items_id = $itemid");

?>