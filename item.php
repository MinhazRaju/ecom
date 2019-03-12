<?php include_once("config.php"); ?>


<?php include(TEMPLATE_FONT.DS."header.php");?>


    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->
<?php include(TEMPLATE_FONT.DS."side_nav.php"); ?>         

<div class="col-md-9">

<!--Row For Image and Short Description-->




    <?php 
    if(isset($_GET['p_id'])):
    $product_id = $_GET['p_id'];

    $result = query("SELECT * FROM product WHERE product_id = $product_id ");

    while($row = fetch_array($result)):

     ?>

    <div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="admin/image/<?php echo $row['product_image'] ?>" alt="">

    </div> 

    <div class="col-md-5">

        <div class="thumbnail">
      
            <div class="caption-full">
                <h4><a href="#"><?php echo $row['product_title'] ?></a> </h4>
                <hr>
                <h4 class="">&#36;<?php echo $row['product_price'] ?></h4>
                <p><?php //echo substr($row['product_description'],0,20).'....' ?></p>
                <p><?php echo $row['short_description'] ?></p>

            <form action="checkout.php" method="post">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="ADD TO CART">
                </div>
               </form>
             </div>
            </div>
</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
   

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <p><?php echo $row['product_description']?></p>

    <p></p>


    <p></p>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  


    

 </div>

</div>


</div><!--Row for Tab Panel-->




</div>
<?php endwhile; ?>
<?php endif; ?>

</div>
    <!-- /.container -->

<?php include(TEMPLATE_FONT.DS."footer.php")?>