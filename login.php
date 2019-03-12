<?php include_once("config.php"); ?>
<?php include(TEMPLATE_FONT.DS."header.php") ?>
<?php login() ?>


    <!-- Page Content -->
    <div class="container">

      <header>
        
        <?php if(isset($_SESSION["error_msg"])): ?>    
        <h1 class=" text-center jumbotron hero-spacer"><?php echo $_SESSION["error_msg"]; ?></h1>
        <?php endif; ?>

        <?php if(isset($_SESSION['username'])): ?>
        <h2 class="hero-spacer">Login as <?php echo $_SESSION['username']  ?></h2> 
        <a class="btn btn-primary" href="admin/logout.php">Logout </a>
         <?php endif; ?>


        <?php if(!isset($_SESSION['error_msg']) && !isset($_SESSION['username'])): ?>
        <h1 class=" text-center jumbotron hero-spacer">Admin Panel</h1><br>
         
        <?php endif; ?>

        

        <?php if(!isset($_SESSION['username'])): ?>  
        <div class="col-sm-4 col-sm-offset-5">         
              userName:user
                <br>
                password:123 
            <form class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="">
                    
                    username<input type="text" name="username" pclass="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  

    <?php endif; ?>
    </header>


        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FONT.DS."footer.php") ?>