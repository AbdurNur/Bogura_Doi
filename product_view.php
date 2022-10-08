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

$id = $_GET['id'];
$where = [
    'id' => $id
];
$table_name = 'stock';
$view_data = get_data($table_name, $where);

// print'<pre>';
// print_r();
// print'</pre>';

?>


<!-- ====================View Section Start===================== -->
<section>

    <div class="container vh-100">
        <div class="row align-items-center vh-100">

            <div class="col-lg-6 col-md-12 text-lg-start text-center">
                <h1 class="mb-5"><span class="text-primary">বগুড়ার মিষ্টি দই</span><br></h1>
                <p class=" pb-2 dark-grey-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quibusdam vitae, culpa </p>
                <ul>
                    <li>Quibusdam vitae</li>
                    <li>Lorem ipsum</li>
                    <li>Lorem ipsum</li>
                    <li>Quibusdam vitae</li>
                    <li>Lorem ipsum</li>
                </ul>
                <form method="POST">
                    <input type="hidden" id="custId" name="order_id" value=<?php echo $view_data->id ?>>
                    <input type="hidden" id="custId" name="hidden_name" value=<?php echo $view_data->product_name ?>>
                    <input type="hidden" id="custId" name="hidden_price" value=<?php echo $view_data->product_price ?>>
                    <input type="hidden" id="custId" name="hidden_image" value=<?php echo $view_data->product_img ?>>

                    <input type="submit" class="btn btn-primary btn-rounded btn-md mt-3 ml-md-0" name="add_to_cart" value="Add To Cart">

                </form>

            </div>
            <div class="col-lg-6 col-md-12 text-lg-end text-md-center text-sm-center">
                <img style="height: 500px; width: 500px;" src="assets/images/<?php echo $view_data->product_img ?>" class="img-fluid">
            </div>

        </div>
    </div>
</section>
<!-- ====================View Section End===================== -->

<!-- Footer Part Start-->
<?php
include "footer.php";
?>
<!-- Footer Part End -->