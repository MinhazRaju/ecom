<div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img style="width:800px; height:240px;" class="slide-image" src="admin/image/ici-dulux-paint-interior-width-300-height-150-ext-sweet-likeness.jpg" alt="">
                                </div>
                    <?php $result = query("SELECT product_image FROM product"); 

                           while($row = mysqli_fetch_array($result)){

                           $image  = $row['product_image'];
                           $view = <<<DELIMETER

                        <div class="item">
                        <img style="width:800px; height:240px;" class="slide-image" src="admin/image/{$image}" alt="">
                        </div>

DELIMETER;
echo $view;
                           } 

                    ?>


                              
                               
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>