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
          <h1 class="m-0">GENEREL USER LIST</h1>
          <?php session_message(); ?>
          
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dasbord.php">Home</a></li>
            <li class="breadcrumb-item active">All User</li>
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
            $table_name='users';

            $where=[
              'user_type'=>'4'


            ];
            $all_user=get_all_data($table_name,$where);

                  // print'<pre>';    
                  // print_r($all_user);
                  // print'</pre>';
          ?>

          <?php if($all_user){
                $sl=1;
            
              ?>
                
                <table class="table table-striped table-hover table-bordered" id='data_table'>
              
                  <thead>
                    <tr>
                      <th scope="col">SL</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Image</th>
                      <th scope="col">User Type</th>
                      <th scope="col">Pre Add</th>
                      <th scope="col">Par Add</th>                    
                      <th scope="col">Created At</th>
                      <th scope="col">Cre By</th>
                      <th scope="col">Upd At </th>
                      <th scope="col">Upd By </th>
                      <th scope="col">Action </th>
                    </tr>
                  </thead>
                    <?php foreach($all_user as $value){
                      ?>  
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $sl++ ?></th>
                          
                          <td><?php echo $value->name  ?></td>
                          <td style="font-size: 12px;"><?php echo $value->email  ?></td>
                          <td><?php echo $value->number  ?></td>
                          <td><?php echo $value->image  ?></td>
                          <td><?php echo $value->user_type  ?></td>
                          <td><?php echo $value->address  ?></td>
                          <td><?php echo $value->parmanent_address  ?></td>
                          <td><?php echo $value->created_at  ?></td>
                          <td><?php echo $value->created_by  ?></td>
                          <td><?php echo $value->update_at  ?></td>
                          <td><?php echo $value->update_by  ?></td>
                          <td>
                            <input type="hidden" name="user_id" value="<?php echo $value->id ?>">
                            <input type="submit" class="btn btn-danger" name="user_delete_btn" value="Delete">                    
                            <a href="#" class="btn btn-success" >Edit</a>                                                          
                          </td>  
                          
                          
                        </tr>
                        
                      </tbody>
                    <?php } ?>
                </table>



              <?php
            
          } 
          ?>
        </form>  



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