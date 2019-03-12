<?php include("../config.php"); ?>

<?php include(TEMPLATE_BACK.DS."header.php"); ?>


<?php 
    
    if(isset($_POST['publish'])){

        $p_id           = $_POST['product_category'];
        $p_title        = $_POST['product_title'];
        $p_price        = $_POST['product_price'];
        $p_description  = $_POST['product_description'];
        $s_description  = $_POST['short_description']; 

        $i_file           = $_FILES['img_file']['name'];   
        $tmp_name         = $_FILES['img_file']['tmp_name'];
        move_uploaded_file($tmp_name, "image/".$i_file);

        $coloum = 'product_category_id,product_title,product_price,product_description,short_description,product_image';
        $value = "'$p_id','$p_title','$p_price','$p_description','$s_description','$i_file'";


        insert_sql('product',$coloum,$value);





    }



 ?>

        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product

</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>



    <div class="form-group">
           <label for="product-title">Short Description</label>
      <textarea name="short_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>


    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>

        <select name="product_category" id="" class="form-control">
        <option value="">Select Category</option>
          <?php $result = select_all_query('category'); 
            while($row  = fetch_array($result)){

              $view =<<<DELIMETER
           
            <option value="{$row['cat_id']}">{$row['cat_title']}</option>


DELIMETER;
 echo $view;
 }

           
          ?>
           
           
        </select>


</div>





    <!-- Product Brands-->




<!-- Product Tags -->


    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="img_file">
      
    </div>

<div class="form-group">
    
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


</aside><!--SIDEBAR-->


    
</form>



                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK.DS."footer.php")?>