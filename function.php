<?php 



//helper funciton 	
function redirect($location){
	header("Location:$location");
}		


function query($sql){

global $con;
$query =  mysqli_query($con,$sql) or die (mysqli_error($con));	
return $query;
}


function fetch_array($result){
	return mysqli_fetch_array($result);
}

function row_counter($coloum,$table_name){
	$result = query("SELECT $coloum FROM $table_name");
	return mysqli_num_rows($result);

}





// get_ product 


function get_product(){

	$result = query("SELECT * FROM product");
	while($row = fetch_array($result)){

	$stringcut = substr($row['short_description'],0,20);
	// After user  DELIMETER make sure there is no-space if space it give error	
$product = <<<DELIMETER

		<div class="col-sm-4 col-lg-4 col-md-4">                    


                        <div class="thumbnail">                           

                            <a href="item.php?p_id={$row['product_id']}"><img src="admin/image/{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?p_id={$row['product_id']}">{$row["product_title"]}</a>
                                </h4>
                                <p>{$stringcut }</p>
                                <a class="btn btn-primary" href="item.php?p_id={$row['product_id']}">Read More</a> 
                                <a class="btn btn-primary" href="cart.php?add={$row['product_id']}">Add Cart</a> 
                            </div>
    
                            
                        </div>
                    </div>



DELIMETER;
	echo $product;
}
}


function get_product_by_cat_id(){
	

	if(isset($_GET['id'])){

		$cat_id = $_GET['id'];

	$result = query("SELECT * FROM product WHERE product_category_id = $cat_id");
	while($row = fetch_array($result)){
$view= <<<DELIMETER


<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="admin/image/{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>{$row['short_description']}</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?p_id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>


DELIMETER;
echo $view;
	
	}

 }
}


function get_product_by_shop_page(){
	

	

	$result = query("SELECT * FROM product");
	while($row = fetch_array($result)){
$view= <<<DELIMETER


<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="admin/image/{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>{$row['short_description']}</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?p_id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>


DELIMETER;
echo $view;
	
	}

 }




function get_category(){



	$result = query("SELECT * FROM category");
	while($row = fetch_array($result)){


$category =<<<DELIMETER


 <a href="category.php?id={$row['cat_id']}" class="list-group-item">{$row['cat_title']}</a>	
			


DELIMETER;
echo $category;
}
}


function set_msg($msg){

	if(!isset($msg)){

		$msg ="";
	}else{

		$_SESSION["msg"] = $msg;
	}
}



function display_msg(){

	if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);

	}
	


}







function login(){


		if(isset($_POST['submit'])){

			$user_name     = $_POST['username'];
			$user_password = $_POST['password'];


	$result = query("SELECT * FROM login WHERE user_name = '$user_name'");
	$row = fetch_array($result);
    $db_pass = $row['user_password'];


	if($user_password === $db_pass){
	

		if(mysqli_num_rows($result) == 0){
			redirect("login.php");

		}else{
			$_SESSION['username'] = $row['user_name'];	
			redirect('admin/index.php');	
			set_msg("Welcom {$_SESSION['username']}");
			unset($_SESSION['error_msg']);

		}


	}

	else{


		redirect("login.php");
		$_SESSION['error_msg'] = "Wrong informatin givin";
		


	}





}
}











//Admin funciton start///


function delete_sql($table_name,$table_id_name){


	if(isset($_GET['id'])){

		$delete_id = $_GET['id'];

		$sql = "DELETE FROM $table_name WHERE $table_id_name = $delete_id";
		return query($sql);
	}

}


function insert_sql($table_name,$row_name,$data){	
	$sql = "INSERT INTO $table_name ($row_name) VALUES ($data) ";
	query($sql);
}


function select_all_query($table_name){


	$sql = "SELECT * FROM category";
	return query($sql);
}





















 ?>