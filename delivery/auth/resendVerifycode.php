<?php 

include "../connect.php";

 $email = filterRequest("emailsend");
 $verifycode = rand(10000,99999);

 $data = array("users_verifycode" => $verifycode);

 $count = updateData("users",$data,"users_name = osama2",false);
if($count > 1){ sendEmail($email,"Verify Code is","Verify Code : $verifycode");
    echo json_encode(array("status" => "success"));
}else{            echo json_encode(array("status" => "failure"));
}
