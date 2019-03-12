
<?php include("../config.php"); ?>

<?php include(TEMPLATE_BACK.DS."header.php"); ?>
<?php if(!isset($_SESSION['username'])){

    redirect("../login.php");
} ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php display_msg(); ?> <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <!-- FIRST ROW WITH PANELS -->

                <!-- /.row -->
                <div class="row">

                     


                    <div class="col-lg-4 col-md-6">
                        <a href="#">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                              
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>                                    
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $product = row_counter('*','product'); ?></div>
                                        <div>Products!</div>
                                    </div>
                                </div>                            
                            </div>                                            
                        </div>
                    </a>
                    </div>
          
                    <div class="col-lg-4 col-md-6">
                        <a href="#">                           
                        
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $category = row_counter('*','category'); ?></div>
                                        <div>Categories!</div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        </a>
                    </div>
            

                </div>
                <div class="row">
                    
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>  
                </div>

        
                <!-- /.row -->


                <!-- SECOND ROW WITH TABLES-->

               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   


   










   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
            
          <?php 

                $data = [ "Product" =>$product , "category" => $category];

                foreach ($data as $key => $value) {
                    echo "['$key'".","."$value],";
                 } 

           ?>

         
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>




    <?php include(TEMPLATE_BACK.DS."footer.php") ?>