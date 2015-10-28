<?php
	include_once ( "adb.php" );
class sales extends adb
{	


function add_sale($product_id,$product_name,$product_qty,$product_price,$total_sale){
       $insert_query= "insert into pos_sales set pos_product_id='$product_id',pos_product_name='$product_name', pos_sale_qty='$product_qty', pos_product_price='$product_price', pos_total_sales='$total_sale'";
        return $this->query ( $insert_query );
    }
   

    function get_all_sales(){
			$str_query= "select * from pos_sales";
			return $this->query($str_query);
		
		}

}

?>