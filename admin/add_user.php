<?php include("../config.php"); ?>

<?php include(TEMPLATE_BACK.DS."header.php"); ?>




        <div id="page-wrapper">

            <div class="container-fluid">

            

            

<h1 class="page-header">
Add user

</h1>




<div class="col-md-4">
    
    <form action="" method="post">

   <?php 
	
		if(isset($_POST['submit'])){

			$name     = $_POST['user_name'];
			$password = $_POST['user_password'];
			$email    = $_POST['user_email'];

			$coloum = 'user_name,user_password,user_email';
			$value  = "'$name','$password','$email'";
		    insert_sql('login',$coloum,$value);	

		    $html = <<<DELIMETER

 		<div class="form-group">            
            <a href="users.php" name="submit" class="btn btn-success">View user</a>
        </div>  



DELIMETER;

echo $html;		    
		}


 ?> 	
    
        <div class="form-group">
            <label for="user-name">Name</label>
            <input type="text" name="user_name" class="form-control">
        </div>         

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="user_password" class="form-control">
        </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="user_email" class="form-control">
        </div>
        
        <div class="form-group">            
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>






  </div>

            <!-- /.container-fluid -->

    </div>
        <!-- /#page-wrapper -->



<?php include(TEMPLATE_BACK.DS."footer.php") ?>