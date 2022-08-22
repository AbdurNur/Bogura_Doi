<!-- header part -->
<?php
include "header.php";

?>


<!-- Top Navbar -->
<?php
include "top_nav.php";
?>

<!-- /.navbar -->

<!-- Left Sidebar Container -->
<?php

include "left_nav.php";




?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
          
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content bg-light">
    <div class=" container-fluid px-5 ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php


          $data= get_all_data('stock');
          if($data){
              foreach($data as $value){?>

              
                  <!-- Grid column -->
                  <div class="col-lg-3 col-md-12   align-items-start   ">
                          

                          <div class="card" style="width: 18rem;">
                             <img  src="../assets/images/<?php echo $value->product_img?>" class="card-img-top" alt="">
                            <div class="card-body text-center">

                              <h5 class="mb-3">
                                        <strong>
                                          <a href="" class="dark-grey-text"><?php echo $value->product_name.'-' .$value->weight?></a>
                                      </strong>
                                
                              </h5>
                              <br>
                              <h5>
                                <strong>
                                    <?php echo $value->product_price?> টাকা
                                </strong>

                              </h5>
                                
                              <div class="product-btn">
                                      <button class="btn btn-primary add-cart">Add To Cart</button>
                                      <a href="#" class="btn btn-primary add-cart">View</a>
                                  </div>
                            </div>
                          </div>
                    </div>



              

              <?php  }



          }else{ ?>
              <div class=" text-center">
                  <h1 class=" text-danger"> PRODUCT NOT UPLOAD YET !</h1>

              </div>



          <?php }



       



        ?>


      
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->






<!-- footer part -->
<?php
include "footer.php";

?>