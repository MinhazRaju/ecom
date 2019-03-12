<?php include_once("config.php"); ?>
<?php include("cart.php"); ?>
<?php include(TEMPLATE_FONT.DS."header.php"); ?>

<?php 

    if(isset($_GET['id'])){
             $id = $_GET['id'];    

 echo  $_SESSION['product_'.$id]."<br/>";

//     $add_product = isset($_SESSION['product_3'])+isset($_SESSION['product_4']);
// echo $add_product;
}
 ?>


    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

        <h4 class="text-center bg-danger"><?php display_msg(); ?></h4>    
        <h1 class="jumbotron hero-spacer text-center">Check Out</h1>
            
         
   

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="alizafar9051@gmail.com">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Cart</th>
           <th>Sub-total</th>
           <th>Add</th>
           <th>Sub</th>
           <th>Delete</th>

     
          </tr>
        </thead>
        <tbody>
            <?php cart();  ?>

            
        </tbody>
    </table>

      <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">   
</form>











<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php 

 echo isset($_SESSION['item']) ? $_SESSION['item'] : $_SESSION['item'] = "";

; ?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">
<?php 

 echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "";

; ?>
    



</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2030</p>
                </div>
            </div>
        </footer>


    </div>
    <!-- /.container -->

 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
