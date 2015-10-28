<?php
	include_once ( "adb.php" );
class products extends adb
{	


function add_product($product_name,$product_qty,$product_price){
       $insert_query= "insert into pos_products set pos_product_name='$product_name', pos_product_qty='$product_qty', pos_product_price='$product_price'";
        return $this->query ( $insert_query );
    }

    function edit_product($product_id,$product_price){
       $update_query= "update pos_products set pos_product_price='$product_price' where pos_product_id = '$product_id'";
        return $this->query ( $update_query );
    }

    function edit_qty($product_id,$product_qty){
       $update_query= "update pos_products set pos_product_qty='$product_qty' where pos_product_id = '$product_id'";
        return $this->query ( $update_query );
    }

    function get_all_products(){
			$str_query= "select * from pos_products";
			return $this->query($str_query);
		
		}


    function get_product($product_id){
      $str_query= "select * from pos_products where pos_product_id = '$product_id'";
      return $this->query($str_query);
    
    }


}

?>