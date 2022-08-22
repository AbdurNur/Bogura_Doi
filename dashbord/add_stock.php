<?php 
// include header
include "header.php";
// include top nav 
include "top_nav.php";

// include left nav
include "left_nav.php";
?>

<div class="container mt-5 pb-5">
    <h1>Add Stock Product</h1>
    <?php session_message(); ?>
    <div class="row" style="border: 2px solid 	#DCDCDC; border-radius:10px ; padding: 20px">
     <div class="col-12">
        <form action="" method="POST" enctype="multipart/form-data">
            

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
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="" class="form-control" name="quantity" />
                <label class="form-label" for="form4Example2">
                <?php
                if(isset($_SESSION['error_field']['quantity']) && !empty($_SESSION['error_field']['quantity'])){
                    ?>
                    <div class="error_show">
                        <span class="text-danger">
                            <?php
                                echo $_SESSION['error_field']['quantity'];
                                unset($_SESSION['error_field']['quantity']);
                            ?>
                            </span>
                    </div>
               <?php }else{
                   ?>
                    Quantity </label>
                   <?php
               }
                ?> 
            </div>
            <!-- Email input -->
            
            
           
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