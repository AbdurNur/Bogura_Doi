<?php


function session_message(){
    
    if(isset($_SESSION['error']) && $_SESSION['error'] == true){ ?>
            <div class="alert alert-danger" role="alert">
                <?php 
                
                echo $_SESSION['message'];

                unset($_SESSION['error']);
                unset($_SESSION['message']);
                
                ?>
            </div>
    <?php }elseif(isset($_SESSION['success']) && $_SESSION['success'] == true){ ?>
        <div class="alert alert-success" role="alert">
                <?php 
                
                echo $_SESSION['message'];

                unset($_SESSION['success']);
                unset($_SESSION['message']);
                
                ?>
            </div>
    <?php }

}


?>