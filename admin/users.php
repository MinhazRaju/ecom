<?php include("../config.php"); ?>
<?php include(TEMPLATE_BACK.DS."header.php"); ?>

<?php delete_sql('login','user_id'); ?>


        <div id="page-wrapper">

            <div class="container-fluid">



                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Users
                         
                        </h1>
                          <p class="bg-success">
                          
                        </p>

                        <a href="add_user.php" class="btn btn-primary">Add User</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>                  
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>

                      <?php 
                       $result =  query("SELECT * FROM login");
                       while($row = fetch_array($result)){

                        $id        = $row['user_id'];       
                        $name      = $row['user_name'];
                        $password  = $row['user_password'];       
                        $email     = $row['user_email'];      

                        $view = <<<DELIMETER



                                    <tr>

                                        <td>{$id}</td>               
                                        <td>{$name}
                                              <div class="action_links">
                                                <a href="users.php?id={$id}">Delete</a>
                                                <a href="">Edit</a>
                                            </div>
                                        </td>                         
                                        <td>{$password}</td>
                                       <td>{$email}</td>
                                    </tr>


                            
DELIMETER;
echo $view;
                       }

                       ?>


                             


                                    
                                    
                        </tbody>
                    </table> <!--End of Table-->

                </div>
        
            </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include(TEMPLATE_BACK.DS."footer.php") ?>