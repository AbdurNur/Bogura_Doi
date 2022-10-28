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
                    <h1 class="m-0">SETTING</h1>
                    <?php session_message(); ?>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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
            <div class="row">
                <form method="POST">
                    <?php
                    $tabe_name = 'settings';
                    $settting_data = get_data($tabe_name);
                    ?>


                    <?php if ($settting_data) {
                        $sl = 1;

                    ?>

                        <table class="table table-striped table-hover table-bordered" id='data_table'>

                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Tittle</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Update At </th>
                                    <th scope="col">Update By </th>
                                    <th scope="col">Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $sl++ ?></th>
                                    <td><?php echo $settting_data->tittle  ?></td>
                                   
                                    <td style="background-color:white;">
                                        <img style="height: 50px; width: 50px;  " src="../assets/images/<?php echo $settting_data->icon  ?>" class="card-img-top" alt="">
                                    </td>
                                    <td style="background-color:white;">
                                        <img style="height: 50px; width: 50px;  " src="../assets/images/<?php echo $settting_data->logo  ?>" class="card-img-top" alt="">
                                    </td>
                                    <td><?php echo $settting_data->created_at  ?></td>
                                    <td><?php echo $settting_data->created_by  ?></td>
                                    <td><?php echo $settting_data->updated_at  ?></td>
                                    <td><?php echo $settting_data->updated_by  ?></td>

                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="setting_edit('<?php echo $settting_data->id ?>')">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php

                    }
                    ?>
                </form>
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">

                <!-- Modal start here -->
                <div class="modal fade" id="setting_edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Product Edite</h5>
                                <div class="text-white rounded-3 bg-primary" id="message"></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="setting_edit_modal_body">





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="setting_edit_submit_btn">Submit</button>
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