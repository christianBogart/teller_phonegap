<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>FLATTY - Free Bootstrap 3 Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<script>
	
	//Function for sending requests
            function sendRequest (url)
           {
               var obj=$.ajax({url:url,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendRequest function


           //            Function to load the list of task
           
			function displayallproducts(){
            $ ( document ).ready ( function ( )
            {
 
			   var url = "controller.php?cmd=2";
               var obj = sendRequest (url);
			
				
                if ( obj.result === 1 )
                {
					   
					var i = 0;
					var list ="";
					
					for ( ; i < obj.products.length; i++ )
                    {
					//list += " <div data-role='collapsible'> <h1>" +obj.entries[i].name+ "</h1> <p>" +obj.entries[i].entry+"</p></div> "
					products +="<table class="table"> <thead> <tr> <th>ID</th> <th>Name</th> <th>Quantity in stock</th> <th>Price(GHC)</th> </tr> </thead> <tbody>
					<tr> <td>"+obj.products[i].pos_products_id+"</td> <td>"+obj.products[i].pos_products_name+"</td> <td>"+obj.products[i].pos_products_qty+"</td> <td>"+obj.products[i].pos_products_price+"</td> </tr> </tbody> </table>";
					}
					//$ ( ".taskpanels" ).slideUp ( 'slow' );
					
                    $ ( "#products_table" ).html (products);
                 }
				 else{
					  $ ( "#tatus" ).text ( "Found no products in stock" );
				 
				 }
				 //$(".checkboxes").hide();
				 //
				 
				 /*
    <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>
    </tbody>
  </table>
				 */
				 //
			
            });
			}


			//Function for adding task
			 function addentry(){
				var name = encodeURI(document.getElementById("name").value);
				var entry = encodeURI(document.getElementById("entry").value);
				
				
				 var url = "../controller.php?cmd=1&name="+name+"&entry="+entry;
               var obj = sendRequest (url);
			  if(obj.result==1){
			  statusmessage(obj.message);
			  }
			  else{
			  errormessage(obj.message);
			  }
			   $("#name").text('');
				$("#entry").text('');
			 }

</script>

  </head>

  <body>

<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><b>FLATTY</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" onclick="displayallproducts()">View stock</a></li>
            <li><a href="#">Add Product</a></li>
            <li><a href="#">Edit Product</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>



    

	<div id="headerwrap">
		<div class="container">
	<div class="row">
				<div class="col-lg-6">
					<h1>Products in stock</h1>
					<div id="products_table">
						
					</div>
					
					<div id="status">
						
					</div>			
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="assets/img/ipad-hand.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
	</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	
	
	<div class="container">
	<div class="row">
				<div class="col-lg-6">
					<h1>Login</h1>
					<form role="form">
					  <div class="form-group">
					    <label for="email">Username:</label>
					    <input type="email" class="form-control" id="user_name"  placeholder="Enter your username here">
					  </div>
					  <div class="form-group">
					    <label for="pwd">Password:</label>
					    <input type="password" class="form-control" id="user_pass" placeholder="Enter your password here">
					  </div>
					  <div class="checkbox">
					    <label><input type="checkbox"> Remember me</label>
					  </div>
					  <button type="submit" class="btn btn-warning btn-lg" onclick="login()">Submit</button>
					</form>	
					<div id="status">
						
					</div>			
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="assets/img/ipad-hand.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
		<p class="centered">Created by CB</p>
	</div><!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
