<?php
	include_once ( "adb.php" );
class users extends adb
{	


function login($user_name,$user_pass){
       $str_query= "select * from pos_users where pos_user_name = '$user_name' AND pos_user_pass='$user_pass' ";
		return $this->query($str_query);
		
    }

   

}

?>