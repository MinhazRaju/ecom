
<?php include_once("config.php"); ?>
<?php include(TEMPLATE_FONT.DS."header.php"); ?>



    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->     
            <h1 class=" text-center jumbotron hero-spacer">Shop</h1>
            
       

        <hr>     
    
        <div class="row text-center">
        <?php get_product_by_shop_page(); ?>     
        </div>
        <!-- /.row -->

    
<?php include(TEMPLATE_FONT.DS."footer.php") ?>