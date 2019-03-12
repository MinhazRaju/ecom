<?php include_once("config.php"); ?>


<?php include(TEMPLATE_FONT.DS."header.php") ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!--Side nva-->

            <?php include(TEMPLATE_FONT.DS."side_nav.php") ?>
            

            <div class="col-md-9">

                <div class="row carousel-holder">
                    
                    <!--Slider-->

                 <?php include(TEMPLATE_FONT.DS."slider.php") ?>   

                </div>

                <h1>
                    
                    <?php   //echo $_SESSION['product_'.$_SESSION['id']];  ?>
                </h1>

                <div class="row">
                     <?php get_product(); ?>                
                    

                </div><!--row end here-->

            </div>

        </div>

    </div>
    <!-- /.container -->

   <?php include(TEMPLATE_FONT.DS."footer.php") ?>