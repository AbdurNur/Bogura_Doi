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
                    <h1 class="m-0">
                        <?php if ($_SESSION['login_user_type'] == '1') {
                            echo 'Admin Profile';
                        } elseif ($_SESSION['login_user_type'] == '2') {
                            echo 'Manager Profile';
                        } elseif ($_SESSION['login_user_type'] == '3') {
                            echo 'Service Profile';
                        } ?>


                    </h1>

                    <?php session_message(); ?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row   ">
                <div class="col col-md-4   ">
                    <div class="card mb-3" style="height: 400px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php

                                if (isset($_SESSION['login_user_type']) && $_SESSION['login_user_type'] == 1) { ?>
                                    <img src="theme/dist/img/admin.png"  style="height: 200px; width: 200px;" class=" p-4 " alt="User Image">

                                <?php } elseif (isset($_SESSION['login_user_type']) && $_SESSION['login_user_type'] == 2) { ?>
                                    <img src="theme/dist/img/manager.png"  style="height: 200px; width: 200px;" class=" p-4" alt="User Image">


                                <?php } elseif (isset($_SESSION['login_user_type']) && $_SESSION['login_user_type'] == 3) { ?>
                                    <img src="theme/dist/img/service.png" style="height: 200px; width: 200px;" class=" p-4" alt="User Image">


                                <?php  }


                                ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">


                                    <ul class="list-group list-group-flush">
                                        
                                        <li class="list-group-item">Name: <?php echo  $_SESSION['login_name']; ?></li>
                                        <li class="list-group-item">Email: <?php echo  $_SESSION['login_email']; ?></li>
                                        <li class="list-group-item">Contact: <?php echo  $_SESSION['login_email']; ?></li>
                                        <li class="list-group-item">Staff Id: <?php echo  $_SESSION['login_staff_id']; ?></li>
                                        <li class="list-group-item">Permanent Address: <?php echo  $_SESSION['login_staff_id']; ?></li>
                                        <li class="list-group-item">Present Address: <?php echo  $_SESSION['login_staff_id']; ?></li>

                                        
                                            <input type="hidden" name="login_user_id" id="login_user_id" value="<?php echo  $_SESSION['login_id']; ?>">
                                        

                                        <li class="list-group-item"><button type="button" class="btn btn-primary" id="edit_profile">Edit</button></li>

                                    </ul>


                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
            <!-- /.row -->


            <!-- /.row -->
            <div class="row">
                <!-- Modal start here -->
                <div class="modal fade" id="profile_edit_view_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                                <div class="text-white rounded-3 bg-primary" id="message"></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="profile_edit_body">




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="edit_submit_btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal end here -->
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