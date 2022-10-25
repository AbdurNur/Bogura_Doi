<?php
// include header
include "header.php";
// include top nav 
include "top_nav.php";

// include left nav
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
          <?php session_message(); ?>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
            <li class="breadcrumb-item active">Message</li>
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
        <?php
        $table_name = 'ask_question';

        $message = get_all_data($table_name,);
        ?>
        <?php

        if ($message) {
          $sl = 1;
        ?>
          <table class="table table-bordered" id='data_table'>
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">CONTACT</th>
                <th scope="col">QUESTION</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">REPLEY DISCRIPTION</th>
                <th scope="col">REPLEY DATE</th>
                <th scope="col">REPLEY BY</th>
                <th scope="col">REPLEY STATUS</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($message as $value) {
              ?>
                <tr>
                  <th scope="row"><?php echo $sl++ ?></th>
                  <td><?php echo $value->name ?></td>
                  <td><?php echo $value->email  ?></td>
                  <td><?php echo $value->contact ?></td>
                  <td><?php echo $value->discription ?></td>
                  <td><?php echo $value->created_at ?></td>
                  <td><?php echo $value->repley_discription ?></td>
                  <td><?php echo $value->replay_at ?></td>
                  <td><?php echo $value->replay_by ?></td>
                  <td><?php echo $value->replay_status ?></td>
                  <td>
                    <?php
                    if ($value->replay_status == 'not_success') { ?>
                     
                      <button type="button" class="btn btn-primary"  onclick="question('<?php echo $value->id ?>')" >REPLAY</button>
                    <?php }
                    ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <!-- end of foreach -->
        <?php } ?>
      </div>
      <!-- /.row -->

      <!-- /.row -->
      <div class="row">

        <!-- Modal start here -->
        <div class="modal fade" id="reply_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Repley</h5>
                <div class="text-white rounded-3 bg-primary" id="message"></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="repley_modal_body">





              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="repley_send_btn">Submit</button>
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




















<?php
// include footer
include "footer.php";

?>