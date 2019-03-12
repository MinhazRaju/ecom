<?php include("../config.php"); ?>

<?php include(TEMPLATE_BACK.DS."header.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Image</th>
           <th>Category</th>
           <th>Price</th>
      </tr>
    </thead>
    <tbody>


      <?php 

 $sql = "SELECT product.product_id, product.product_title, product.product_image,product.product_price,category.cat_title FROM product LEFT JOIN category ON product.product_category_id = category.cat_id";

      $result = query($sql);
      while($row = fetch_array($result)){

          $id        = $row['product_id'];
          $title     = $row['product_title'];  
          $image     = $row['product_image'];  
          $price     = $row['product_price']; 
          $cat_title = $row['cat_title'];
            

        $view = <<<DELIMETER

        <tr>

            <td>{$id}</td>
            <td>{$title}</td>
            <td><img width="200px" height="200px" src="image/{$image}" alt=""></td>
            <td>{$cat_title}</td>
            <td>{$price}</td>
        </tr>


DELIMETER;
     echo $view;
      }


      ?>

      
      


  </tbody>
</table>











                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->






  <?php include(TEMPLATE_BACK.DS."footer.php")?>