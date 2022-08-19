<!-- Header Prat Start -->
<?php
    include "header.php";
?>
<!-- Header Prat End -->

<!-- ====================Top Nav Start ===================== -->
<?php
include "top_nav.php"
?>
<!-- ====================Top Nav End ===================== -->

<?php

$login_id=$_SESSION['login_id'];



$where=[
    'user_id'=>$login_id
];

$oder_data=get_all_data('product_order',$where);
           
           


?>

<section class=" mt-5">
        <div class="container py-5 vh-100">
            <div class="row align-items-center">

                <?php
                // print'<pre>';    
                // print_r($_SESSION['login_id']);
                // print'</pre>';

                if($oder_data){
                    $sl=1;
                    ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">PRODUCT</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">RATE</th>
                                    <th scope="col">COMMISSION</th>
                                    <th scope="col">TOTAL PRICE</th>
                                    <th scope="col">ORDER NO</th>
                                    
                                    <th scope="col">ORDER STATUS</th>
                                    <th scope="col">ORDER DATE</th>
                                    <th scope="col">DELIVERED DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($oder_data as $value){ 
                            
                                       
                                        
                                    
                                        ?>
                                        <tr style="background-color:<?php echo $value->color_code ?>;">
                                            <th scope="row"><?php echo $sl++?></th>
                                            
                                            <td style="background-color:white;">
                                            <img style="height: 50px; width: 50px;  " src="assets/images/<?php echo $value->product_img?>" class="card-img-top" alt="">
                                            </td>
                                            <td><?php echo $value->product_name ?></td>
                                            <td><?php echo $value->quantity ?></td>
                                            <td><?php echo $value->price ?></td>
                                            <td><?php echo $value->commission ?></td>
                                            <td><?php echo $value->total_price ?></td>
                                            <td><?php echo $value->order_no ?></td>
                                            <td><?php echo $value->oder_status ?></td>
                                            <td><?php echo $value->order_date ?></td>                                                      
                                            <td>
                                                <?php
                                                if(!empty($value->dalivery_date)){
                                                    echo $value->dalivery_date;


                                                }else{
                                                    echo "Delevery Not Yet";


                                                }
                                            
                                            
                                                ?>
                                            </td>                                                      
                                        </tr>
                                    <?php } ?>
                            
                            </tbody>
                        </table>
                    
                    <!-- end of foreach -->

                <?php }else{ ?>

                    <div>

                        <h1 class=" text-danger">NO ORDER YET !</h1>
                    </div>



                
                
                <?php } ?>
            </div>
        </div>
</section>
















<!-- Footer Part Start-->
<?php
include "footer.php";
?>
<!-- Footer Part End -->