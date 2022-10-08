<?php
include "header.php";
include 'top_nav.php';
// Remove
if( isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                
                echo '<script>window.location="card.php"</script>';
            }
        }
    }
}
$total=0;

?>



<div class=" container-fluid my-5 ">
    <div class="row justify-content-center ">
        <form method="post">
            <div class="col-xl-10">
                <div class="card shadow-lg ">

                    <div class="row justify-content-around">
                        <div class="col col-md-6">
                            <div class="col">
                                <p class="text-muted space mb-0 shop"> Order No.78618K</p>

                            </div>

                        </div>
                        <div class="col col-md-6 text-start">
                            <input type="submit" class="btn btn-danger" name="order_cancel" value="ODER CANCEL">

                        </div>

                        <div class="col-md-6">


                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Reciver Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Reciver Contact</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Reciver Address</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>




                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 ">

                                <div class="card-header card-2">
                                    <p class="card-text text-muted mt-md-4  mb-2 space">YOUR ORDER <span class=" small text-muted ml-2 cursor-pointer">EDIT SHOPPING BAG</span> </p>
                                    <hr class="my-2">
                                </div>
                                <div class="card-body pt-0">
                                    <?php foreach ($_SESSION["shopping_cart"] as $keys => $values) {  
                                        
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);

                                        $_SESSION["total"]=$total;

                                        
                                        ?>
                                        <div class="row  justify-content-between">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row">
                                                    <img class=" img-fluid" src="assets/images/<?php echo $values["item_image"] ?>" width="62" height="62">

                                                    <div class="media-body  my-auto">
                                                        <div class="row ">
                                                            <div class="col-auto">
                                                                <p class="mb-0"><b><?php echo $values["item_name"]; ?></b></p><small class="text-muted">1 Week Subscription</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class=" pl-0 flex-sm-col col-auto  my-auto">
                                                <input type="submit" class="btn " name="add" value="+">
                                            </div>



                                            <div class=" pl-0 flex-sm-col col-auto  my-auto">
                                                <p class="boxed-1"><?php echo $values["item_quantity"]; ?></p>
                                            </div>

                                            <div class=" pl-0 flex-sm-col col-auto  my-auto">
                                                <input type="submit" class="btn " name="excpet" value="-">
                                            </div>

                                            <div class=" pl-0 flex-sm-col col-auto  my-auto ">
                                                <p><b><?php echo $values["item_price"]; ?></b></p>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto ">
                                                <a href="card.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-danger">Remove</span></a></td>
                                            </div>

                                            
                                        </div>

                                    <?php } ?>

                                    <hr class="my-2">
                                    <div class="row ">
                                        <div class="col">
                                            <div class="row justify-content-between">
                                                <div class="col-4">
                                                    <p class="mb-1"><b>Subtotal</b></p>
                                                </div>
                                                <div class="flex-sm-col col-auto">
                                                    <p class="mb-1"><b><?php echo$_SESSION["total"]?>Tk</b></p>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <p class="mb-1"><b>Commission 5%</b></p>
                                                </div>
                                                <div class="flex-sm-col col-auto">
                                                    <?php
                                                    $total=$_SESSION["total"];
                                                    $commission=$total*0.05
                                                    
                                                    ?>
                                                    <p class="mb-1"><b><?php echo$commission?> TK</b></p>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-4">
                                                    <p><b>Total</b></p>
                                                </div>
                                                <div class="flex-sm-col col-auto">
                                                    <p class="mb-1"><b><?php
                                                    $subtotoal=$total-$commission;
                                                    echo $subtotoal;
                                                    ?>TK</b></p>
                                                </div>
                                            </div>
                                            <hr class="my-0">
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>














    <?php include "footer.php";  ?>