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
            $table_name = 'stock';
            $order = 'ASC';
            $order_BY = 'product_sl';

            $data = get_all_data($table_name,);
            if ($data) {
                foreach ($data as $value) { ?>



                    <!-- Grid column -->
                    <div class="col-lg-3 col-md-6 mb-4 d-flex  align-items-start">
                        <!-- Card -->
                        <div class="card align-items-center flex-wrap">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img src="assets/images/<?php echo $value->product_img ?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <h5 class="mb-3">
                                    <strong>
                                        <a href="" class="dark-grey-text"><?php echo $value->product_name . '-' . $value->weight ?></a>
                                    </strong>
                                </h5>
                                <h5 class="font-weight-bold blue-text mb-0">
                                    <strong><?php echo $value->product_price ?> টাকা</strong>
                                </h5>
                                <div class="product-btn">
                                    <form method="POST">
                                        <input type="hidden" id="custId" name="order_id" value=<?php echo $value->id ?>>
                                        <input type="hidden" id="custId" name="hidden_name" value=<?php echo $value->product_name ?>>
                                        <input type="hidden" id="custId" name="hidden_price" value=<?php echo $value->product_price ?>>
                                        <input type="hidden" id="custId" name="hidden_image" value=<?php echo $value->product_img?>>

                                        <input type="submit" class="btn btn-primary  add-cart" name="add_to_cart" value="Add_To_Cart">
                                    </form>
                                    <a href="product_view.php?id=<?php echo $value->id ?>" class="btn btn-primary add-cart">View</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php  }
            } else { ?>
                <div class=" text-center">
                    <h1 class=" text-danger"> PRODUCT NOT UPLOAD YET !</h1>
                </div>
            <?php }

            ?>


            
        </div>
    </div>
</section>