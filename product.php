


<section class="text-center bg-light">
    <div class="container py-5">
        <!--Section: Content-->
        <!-- Section heading -->
        <h3 class="font-weight-bold mb-4 pb-2">Our Sweets</h3>
        <!-- Section description -->
        <p class="grey-text mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit
            fugit, error amet numquam .</p>

        <div class="row">

            <?php


                $data= get_all_data('products');
                

               
                foreach($data as $value){?>

            
                <!-- Grid column -->
                <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                        <!-- Card -->
                        <div class="card align-items-center">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img src="assets/images/<?php echo $value->product_img?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <h5 class="mb-3">
                                    <strong>
                                        <a href="" class="dark-grey-text"><?php echo $value->product_name.'-' .$value->weight?></a>
                                    </strong>
                                </h5>
                                <h5 class="font-weight-bold blue-text mb-0">
                                    <strong><?php echo $value->product_price?> টাকা</strong>
                                </h5>
                                <div class="product-btn">
                                    <button class="btn btn-primary add-cart">Add To Cart</button>
                                    <a href="product_view.php?id=<?php echo $value->id?>" class="btn btn-primary add-cart">View</a>
                                </div>
                            </div>
                        </div>
                    </div>

                   

              <?php  }
                
                
               

            ?>
                 



                

                

            

           
            

        </div>




    </div>
</section>