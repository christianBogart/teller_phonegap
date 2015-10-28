<?php


if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        case 1:
            login();
            break;
        case 2:
            get_products();
            break;
        case 3:
            add_product();
            break;
		case 4:
            edit_product();
            break;
        case 5:
            get_product();
            break;
        case 6:
            get_sales();
            break;
        case 7:
            add_sale();
            break;
        case 8:
            edit_qty();
            break;
            default:
            echo '{"result":0,message:"failed command"}';
            break;
    }//end of switch
    
}//

function login( ){
	include("users.php");
	$obj=new users();
	$user_name=$_REQUEST['user_name'];
	$user_pass=$_REQUEST['user_pass'];
	
	if(!$obj->login($user_name,$user_pass)){
		//return error
		echo '{"result":0,"message": "login failed"}';
		return;
	}
		else{
			$row=$obj->fetch();

     if($obj->get_num_rows()==1){
		echo '{"result":1,"message":"You have been successfully logged in"}';
	}
	else{
		echo '{"result":0,"message": "Sorry, failed to log in"}';
	}
}
}

						


function add_product( ){
	include("products.php");
	$obj=new products();
	$product_name=$_REQUEST['product_name'];
	$product_qty=$_REQUEST['product_qty'];
	$product_price=$_REQUEST['product_price'];
	
	
	if(!$obj->add_product($product_name,$product_qty,$product_price)){
		echo  '{"result":0,"message": "failed to add product"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added product"}';
	
	}
}

function edit_product( ){
	include("products.php");
	$obj=new products();
	$product_id=$_REQUEST['product_id'];
	$product_price=$_REQUEST['product_price'];
	
	
	if(!$obj->edit_product($product_id,$product_price)){
		echo  '{"result":0,"message": "failed to update product"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully updated product"}';
	
	}
}


function edit_qty( ){
	include("products.php");
	$obj=new products();
	$product_id=$_REQUEST['product_id'];
	$product_qty=$_REQUEST['product_qty'];
	
	
	if(!$obj->edit_qty($product_id,$product_qty)){
		echo  '{"result":0,"message": "failed to update product"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully updated product"}';
	
	}
}


function get_products( ){

	include("products.php");
	
	$obj= new products();

	
	 if(!$obj->get_all_products()){
		//return error
		echo '{"result":0,"message": "failed to display products"}';
		return;
     }else{
	$row = $obj->fetch();
	echo '{"result":1,"products":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
     }
}

function get_product( ){

	include("products.php");
	$obj= new products();
	$product_id=$_REQUEST['product_id'];
	
	 if(!$obj->get_product($product_id)){
		//return error
		echo '{"result":0,"message": "failed to display products"}';
		return;
     }else{
	$row = $obj->fetch();
	echo '{"result":1,"products":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
     }
}

function add_sale( ){
	include("sales.php");
	$obj=new sales();
	$product_id=$_REQUEST['product_id'];
	$product_name=$_REQUEST['product_name'];
	$product_qty=$_REQUEST['product_qty'];
	$product_price=$_REQUEST['product_price'];
	$total_price=$_REQUEST['total_price'];
	
	
	
	
	if(!$obj->add_sale($product_id,$product_name,$product_qty,$product_price,$total_price)){
		echo  '{"result":0,"message": "failed to add sale"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added sale"}';
	
	}
}

function get_sales( ){

	include("sales.php");
	
	$obj= new sales();

	
	 if(!$obj->get_all_sales()){
		//return error
		echo '{"result":0,"message": "failed to display sales"}';
		return;
     }else{
	$row = $obj->fetch();
	echo '{"result":1,"sales":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
     }
}

?>