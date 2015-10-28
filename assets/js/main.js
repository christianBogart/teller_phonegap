 
var old_qty = 0;


 function sendRequest (url)
           {
               var obj=$.ajax({url:url,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendRequest function


			function login(){
			            $ ( document ).ready ( function ( )
			            {
			 				var user_name = encodeURI(document.getElementById("user_name").value);
							var user_pass = encodeURI(document.getElementById("user_pass").value);
						   var url = "controller.php?cmd=1&user_name="+user_name+"&user_pass="+user_pass;
			               var obj = sendRequest (url);
						
							
			                if ( obj.result === 1 )
			                {
								   window.location.replace("page.html");

								   window.onload = function() {
 									displayallproducts();
									};

								   //displayallproducts();
			                 }
							 else{
								  $ ( "#status" ).text ( "login failed" );
							 
							 }
							 //$(".checkboxes").hide();
			            });
						} 

			function displayallproducts(){
		            $ ( document ).ready ( function ( )
		            {
		 
					   var url = "controller.php?cmd=2";
		               var obj = sendRequest (url);
					
						
		                if ( obj.result === 1 )
		                {
							   
							var i = 0;
							var products ="";
							
							for ( ; i < obj.products.length; i++ )
		                    {
							
							products += " <tr> <td>"+obj.products[i].pos_product_id+"</td> <td>"+obj.products[i].pos_product_name+"</td> <td>"+obj.products[i].pos_product_qty+"</td> <td>"+obj.products[i].pos_product_price+"</td> </tr> ";
							}
							
							
		                    $ ( "#products_table" ).html (products);


		                    //$ ( "#add_panel" ).style.visibility = 'hidden';
		                 }
						 else{
							  $ ( "#status" ).text ( "Found no products in stock" );
						 
						 }
					
		            });
			}


			//Function for adding task
			 function addproduct(){
				var product_name = encodeURI(document.getElementById("product_name").value);
				var product_qty = encodeURI(document.getElementById("product_qty").value);
				var product_price = encodeURI(document.getElementById("product_price").value);
				
				
				 var url = "controller.php?cmd=3&product_name="+product_name+"&product_qty="+product_qty+"&product_price="+product_price;
               var obj = sendRequest (url);
			  if(obj.result==1){
			  //statusmessages(obj.message);
			  $ ("#display").html("");
			  }
			  else{
			  errormessage(obj.message);
			  }
			  
			  // $("#name").text('');
				//$("#entry").text('');
			 }

 			function addsale(){

				var product_id = encodeURI(document.getElementById("product_id").value);
				var product_name = encodeURI(document.getElementById("product_name").value);
				var product_qty = encodeURI(document.getElementById("product_qty").value);
				var product_price = encodeURI(document.getElementById("product_price").value);
				var total_sale = encodeURI(document.getElementById("total_sale").value);
				
				
				
				 var url = "controller.php?cmd=7&product_id="+product_id+"&product_name="+product_name+"&product_qty="+product_qty+"&product_price="+product_price+"&total_price="+total_sale;
               var obj = sendRequest (url);
			  if(obj.result==1){
			  //statusmessages(obj.message);
			   editqty(old_qty);
			  $ ("#display").html("");
			  displayallproducts();
			  displayallsales();

			  }
			  else{
			  errormessage(obj.message);
			  }
			  
			  // $("#name").text('');
				//$("#entry").text('');
			 }


			 function displayallsales(){
		            $ ( document ).ready ( function ( )
		            {
		 
					   var url = "controller.php?cmd=6";
		               var obj = sendRequest (url);
					
						
		                if ( obj.result === 1 )
		                {
							   
							var i = 0;
							var sales ="";
							
							for ( ; i < obj.sales.length; i++ )
		                    {
							
							sales += " <tr> <td>"+obj.sales[i].pos_sale_id+"</td> <td>"+obj.sales[i].pos_product_id+"</td> <td>"+obj.sales[i].pos_product_name+"</td> <td>"+obj.sales[i].pos_product_qty+"</td> <td>"+obj.sales[i].pos_product_price+"</td> <td>"+obj.sales[i].pos_total_salese+"</td> <td>"+obj.sales[i].pos_sale_date+"</td> </tr> ";
							}
							
							
		                    $ ( "#sales_table" ).html (sales);


		                    //$ ( "#add_panel" ).style.visibility = 'hidden';
		                 }
						 else{
							  $ ( "#status" ).text ( "Found no products in stock" );
						 
						 }
					
		            });
			}


 			function editproduct(){
				var product_id = encodeURI(document.getElementById("product_id").value);
				var product_price = encodeURI(document.getElementById("product_price").value);
				
				
				 var url = "controller.php?cmd=4&product_id="+product_id+"&product_price="+product_price;
               var obj = sendRequest (url);
			  if(obj.result===1){
			  //statusmessages(obj.message);
			  $ ("#display").html("");
			  }
			  else{
			  errormessage(obj.message);
			  }
			  
			  // $("#name").text('');
				//$("#entry").text('');
			 }

			 function editqty(qty){
				var product_id = encodeURI(document.getElementById("product_id").value);
				var product_qty = encodeURI(document.getElementById("product_qty").value);
				var new_qty = qty - product_qty;
				
				 var url = "controller.php?cmd=8&product_id="+product_id+"&product_qty="+new_qty;
               var obj = sendRequest (url);
			  if(obj.result===1){
			  //statusmessages(obj.message);
			  $ ("#display").html("");
			  }
			  else{
			  errormessage(obj.message);
			  }
			  
			  // $("#name").text('');
				//$("#entry").text('');
			 }




			 function displayaddform(){


					var addform = "" ;
					addform = "<h1>Add Product</h1><form role='form'><div class='form-group'><label for='product_name'>Product name:</label><input type='text' class='form-control' id='product_name'  placeholder='Enter Product Name'></div><div class='form-group'><label for='product_qty'>Product Quantity:</label><input type='text' class='form-control' id='product_qty'  placeholder='Enter product quantity'></div><div class='form-group'><label for='product_price'>Product Price(GHc) :</label><input type='number' step='any' class='form-control' id='product_price'  placeholder='Enter product price'></div> <button type='submit' class='btn btn-warning btn-lg' onclick='addproduct()'>Add Product</button></form>	<div id='status'></div>";


				 	$ ("#display").html(addform);
							
}



			function displaysaleform(){


					var saleform = "" ;
					saleform = "<h1>Add Sale</h1><input type='button' class='btn btn-warning btn-lg' value='Scan BarCode' onclick='salescan()'><input type='button' class='btn btn-warning btn-lg' value='Get Product' onclick='getSale()'><form role='form'><div class='form-group'><label for='product_id'>Product ID:</label><input type='text' class='form-control' id='product_id'  placeholder='Enter Product ID'></div><div class='form-group'><label for='product_name'>Product name:</label><input type='text' class='form-control' id='product_name'  placeholder='Product Name' readonly></div><div class='form-group'><label for='product_price'>Product Price(GHc) :</label><input type='text' step='any' class='form-control' id='product_price'  placeholder='Product price' readonly></div>  <div class='form-group'><label for='total_sale'>Total Sale:</label><input type='text' class='form-control' id='total_sale'  placeholder='Total price' readonly></div><div class='form-group'><label for='product_qty'>Quantity:</label><input type='number' class='form-control' id='product_qty'  placeholder='Enter quantity' onchange='settotal(this.value)''></div><button type='submit' class='btn btn-warning btn-lg' onclick='addsale()'>Add Sale</button></form>	<div id='status'></div>";


				 	$ ("#display").html(saleform);
							
}


						

						function settotal(val) {
						    document.getElementById('total_sale').value = val *  document.getElementById('product_price').value;
						}



			function displayeditform(){


					var editform = "" ;
					editform = "<h1>Edit Price</h1><form role='form'><div class='form-group'><label for='product_name'>Product id:</label><input type='text' class='form-control' id='product_id'  placeholder='Enter Product id'></div><div class='form-group'><label for='product_price'>Product Price(GHc) :</label><input type='number' step='any' class='form-control' id='product_price'  placeholder='Enter product price'></div> <button type='submit' class='btn btn-warning btn-lg' onclick='editproduct()'>Update Product</button></form> <div id='status'></div>";


				 	$ ("#display").html(editform);
							

			 }
			 function displayscan(){
			 		var scanform = "";
			 		scanform = "<input type='button' value='Scan Code' onclick='scan()' >"
					$ ("#display").html(scanform);

			 }



			function getProduct(product_id){
				$ ( document ).ready ( function ( )
		            {
		 
					   var url = "controller.php?cmd=5&product_id="+product_id;
		               var obj = sendRequest (url);
					
						
		                if ( obj.result === 1 )
		                {
							   
							var i = 0;
							var products ="";
							
							for ( ; i < obj.products.length; i++ )
		                    {
							
							products += " <tr> <td>"+obj.products[i].pos_product_id+"</td> <td>"+obj.products[i].pos_product_name+"</td> <td>"+obj.products[i].pos_product_qty+"</td> <td>"+obj.products[i].pos_product_price+"</td> </tr> ";
							}
							
							
		                    $ ( "#products_table" ).html (products);

		                    $ ("#display").html("");


		                    //$ ( "#add_panel" ).style.visibility = 'hidden';
		                 }
						 else{
							  $ ( "#status" ).text ( "Found no products in stock" );
						 
						 }
					
		            });

			}


			function getSale(){
				$ ( document ).ready ( function ( )
		            {
		 			   var product_id = encodeURI(document.getElementById("product_id").value);
					   var url = "controller.php?cmd=5&product_id="+product_id;
		               var obj = sendRequest (url);
					
						
		                if ( obj.result === 1 )
		                {
							   
							var i = 0;
							var products ="";
							
							for ( ; i < obj.products.length; i++ )
		                    {
							
							products += " <tr> <td>"+obj.products[i].pos_product_id+"</td> <td>"+obj.products[i].pos_product_name+"</td> <td>"+obj.products[i].pos_product_qty+"</td> <td>"+obj.products[i].pos_product_price+"</td> </tr> ";


							$ ( "#products_id" ).value ==(obj.products[i].pos_product_id);
		                    $ ( "#products_name" ).value == (obj.products[i].pos_product_name);
		                    $ ( "#products_price" ).value == (obj.products[i].pos_product_price);
		                    old_qty = (obj.products[i].pos_product_qty);

		                    var id = document.getElementById("product_id");
							id.value = (obj.products[i].pos_product_id);

							var name = document.getElementById("product_name");
							name.value = (obj.products[i].pos_product_name);

							var price = document.getElementById("product_price");
							price.value = (obj.products[i].pos_product_price);

							}
							
							
		                   

		              


		                    //$ ( "#add_panel" ).style.visibility = 'hidden';
		                 }
						 else{
							  $ ( "#status" ).text ( "Found no products in stock" );
						 
						 }
					
		            });

			}

			 function salescan(){
				cordova.plugins.barcodeScanner.scan(
			      function (result) {
			          // alert("Value is\n" +
			          //       "Result: " + result.text + "\n" +
			          //       "Format: " + result.format + "\n" +
			          //       "Cancelled: " + result.cancelled);
			              
			         var scanresult = "";
			         scanresult = "Product id: " + result.text;
 					var id = document.getElementById("product_id");
					id.value = result.text;

			         getSale(result.text);
			      }, 
			      function (error) {
			          alert("Scanning failed: " + error);
			      }
			   );
			}


			function scan(){
				cordova.plugins.barcodeScanner.scan(
			      function (result) {
			          // alert("Value is\n" +
			          //       "Result: " + result.text + "\n" +
			          //       "Format: " + result.format + "\n" +
			          //       "Cancelled: " + result.cancelled);
			              
			         var scanresult = "";
			         scanresult = "Product id: " + result.text;
			         $ ("#display").html(scanresult);
			         getProduct(result.text);
			      }, 
			      function (error) {
			          alert("Scanning failed: " + error);
			      }
			   );
			}

