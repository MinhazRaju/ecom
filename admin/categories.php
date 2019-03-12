

<?php include("../config.php"); ?>

<?php include(TEMPLATE_BACK.DS."header.php"); ?>


<?php 
    
    if(isset($_POST['submit'])){

        $cat_title = $_POST['category_title'];
        

        $coloum_name = 'cat_title';
        $values      = "'$cat_title'";

        insert_sql('category',$coloum_name,$values);


    }


 ?>


        <div id="page-wrapper">

            <div class="container-fluid">

            

            

<h1 class="page-header">
  Product Categories

</h1>


<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="category_title" class="form-control">
        </div>         

        <div class="form-group">
            
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Delete</th>
        </tr>
            </thead>


    <tbody>
        
            <?php 
                delete_sql('category','cat_id');
                $result = select_all_query('category');
           
                if(mysqli_num_rows($result) > 0) {
                while($row  = fetch_array($result)){
                    $view = <<<DELIMETER
                    <tr>
                    <td>{$row['cat_id']}</td>
                    <td>{$row['cat_title']}</td>
                    <td><a href="categories.php?id={$row['cat_id']}">Delete</a></td>
                    </tr>
DELIMETER;
echo $view;
                 }    
}else{

echo "<h2 class='bg bg-danger text-center'>Category Not Found</h2>";

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