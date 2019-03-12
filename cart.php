<?php include_once("config.php"); ?>

<?php 

	if(isset($_GET['add'])){

		$id  = $_GET['add'];

		$result = query("SELECT * FROM product WHERE product_id = '$id' ");

		while($row = fetch_array($result)){

			if($row['product_quantity'] != $_SESSION['product_'.$id]){

				$_SESSION['product_'.$id] +=1; 
				redirect("checkout.php?id=$id");
			
			}else{

				set_msg("We have " . $row['product_quantity']." ".$row['product_title']." Available");

				redirect("checkout.php");
			}

		}
		// $_SESSION['id'] = $_GET['add'];	 
		// $_SESSION['product_'.$_SESSION['id']] +=1; 
		// redirect("index.php");


	}





	if(isset($_GET['add_id'])){

		    $id = $_GET['add_id'];
			 $_SESSION['product_'.$id]++;
			redirect("checkout.php");
	}
	

	if(isset($_GET['sub_id'])){

		    $id = $_GET['sub_id'];
		    $_SESSION['product_'.$id]--;

		    if($_SESSION['product_'.$id] < 1){
 				$_SESSION['product_'.$id] = 0;
		    	set_msg("Add some product");
		    	redirect("checkout.php");
		    }else{
			redirect("checkout.php");	

		    }
			
	}
	
	if(isset($_GET['delete_id'])){

		    $id = $_GET['delete_id'];
		    $_SESSION['product_'.$id] = 0;
			set_msg("Your cart is empty");

			redirect("checkout.php");

	}





function cart(){
$total = 0;
$item  = 0; 
$item_name = 1;
$item_number = 1;
$item_amount = 1;

	foreach ($_SESSION as $key => $value) {
//  return this 	   ["product_3"]=>  int(1)	

// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";


	if(substr($key, 0 , 8) == "product_"){

// Then we check this $_SESSION ["product_1,2,3"] (session_name) to sub substr funcition.
	

	$length = strlen($key); // We Grab this session key length;
	$start_point =  $length - 8;// Then we calculation this lenght for substr ending point
	$id = substr($key, 8 , $start_point );// we set session key then we set start point and then we set ending point.. This is return this key last value key is {product_1,2,3} like then we grab just 1,2,3
	

             $result = query("SELECT * FROM product WHERE product_id = '$id' ");

             $cart = $_SESSION['product_'.$id];
                while($row = fetch_array($result)){
                 $multiply= $cart * $row['product_price'];    
                 $view = <<<DELIMETER


                 <tr>
                <td>{$row['product_title']}</td>
                <td>&#36;{$row['product_price']}</td>
                <td>{$row['product_quantity']}</td>
                <td>$cart</td> 
                <td>&#36;{$multiply}</td>    
                <td><a class="btn btn-success" href="cart.php?add_id={$row['product_id']}">+</a></td>
                <td><a class="btn btn-warning" href="cart.php?sub_id={$row['product_id']}">-</a></td>   
                <td><a class="btn btn-danger" href="cart.php?delete_id={$row['product_id']}">x</a></td> 

 					</tr>


<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
<input type="hidden" name="item_number_{$item_number}" value="{$cart}">
<input type="hidden" name="amount_{$item_amount}" value="{$multiply}">     
                            
                
DELIMETER;
echo $view;
$item_name++;
$item_number++;
$item_amount++;

       }

$_SESSION['item_total'] = $total +=$multiply; 
$_SESSION['item']       = $item  +=$cart; 

	}		

 }

}



 ?>