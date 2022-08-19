<?php 
// include header
include "header.php";
// include top nav 
include "top_nav.php";

// include left nav
include "left_nav.php";
?>

<div class="container mt-5 pb-5">
    <h1>Upload View Product</h1>
    <?php session_message(); ?>
    <div class="row" style="border: 2px solid 	#DCDCDC; border-radius:10px ; padding: 20px">
     <div class="col-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="product_sl" />
                <label class="form-label" for="form4Example1"><?php
                if(isset($_SESSION['error_field']['product_sl']) && !empty($_SESSION['error_field']['product_sl'])){
                    ?>
                    <div class="error_show">
                        <span class="text-danger">
                            <?php
                                echo $_SESSION['error_field']['product_sl'];
                                unset($_SESSION['error_field']['product_sl']);
                            ?>
                            </span>
                    </div>
               <?php }else{
                   ?>
                     product sl</label>
                   <?php
               }     
                ?> 
            </div>

            <!-- input -->
            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="product_name" />
                <label class="form-label" for="form4Example2">
                <?php
                if(isset($_SESSION['error_field']['product_name']) && !empty($_SESSION['error_field']['product_name'])){
                    ?>
                    <div class="error_show">
                        <span class="text-danger">
                            <?php
                                echo $_SESSION['error_field']['product_name'];
                                unset($_SESSION['error_field']['product_name']);
                            ?>
                            </span>
                    </div>
               <?php }else{
                   ?>
                     product Name</label>
                   <?php
               }
                ?> 
            </div>


            <!--  input -->
            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="product_price" />
                <label class="form-label" for="form4Example2">
                <?php
                if(isset($_SESSION['error_field']['product_price']) && !empty($_SESSION['error_field']['product_price'])){
                    ?>
                    <div class="error_show">
                        <span class="text-danger">
                            <?php
                                echo $_SESSION['error_field']['product_price'];
                                unset($_SESSION['error_field']['product_price']);
                            ?>
                            </span>
                    </div>
               <?php }else{
                   ?>
                    Product Price </label>
                   <?php
               }
                ?> 
            </div>
            <!--  input -->
            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="product_code" />
                <label class="form-label" for="form4Example2">
                <?php
                if(isset($_SESSION['error_field']['product_code']) && !empty($_SESSION['error_field']['product_code'])){
                    ?>
                    <div class="error_show">
                        <span class="text-danger">
                            <?php
                                echo $_SESSION['error_field']['product_code'];
                                unset($_SESSION['error_field']['product_code']);
                            ?>
                            </span>
                    </div>
               <?php }else{
                   ?>
                    Product Code </label>
                   <?php
               }
              ?> 
                
            </div>
            <!--  input -->
            <div class="form-outline mb-4">
                <input type="text" id="form4Example2" class="form-control" name="weight" />
                <label class="form-label" for="form4Example2">
                <?php
                if(isset($_SESSION['error_field']['weight']) && !empty($_SESSION['error_field']['weight'])){
                    ?>
                    <div class="error_show">
                        <span class="text-danger">
                            <?php
                                echo $_SESSION['error_field']['weight'];
                                unset($_SESSION['error_field']['weight']);
                            ?>
                            </span>
                    </div>
               <?php }else{
                   ?>
                    Weight </label>
                   <?php
               }
              ?> 
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="file" id="form4Example2" class="form-control" name="product_img" />
                <label class="form-label" for="form4Example2">
                <?php
                if(isset($_SESSION['error_field']['name']) && !empty($_SESSION['error_field']['name'])){
                    ?>
                    <div class="error_show">
                        <span class="text-danger">
                            <?php
                                echo $_SESSION['error_field']['name'];
                                unset($_SESSION['error_field']['name']);
                            ?>
                            </span>
                    </div>
               <?php }else{
                   ?>
                    AttachMent </label>
                   <?php
               }
              ?> 
            </div>  
            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-block mb-4" value="Add Product" name="add_product">
        </form>
     </div>
    </div>
</div>
<?php



// include footer
include "footer.php";

?>