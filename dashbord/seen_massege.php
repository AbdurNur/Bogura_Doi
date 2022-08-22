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
            <li class="breadcrumb-item active">Dashboard v1</li>
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
                    
            $table_name='ask_question';

            $where=[
                'replay_status'=> 'not_success',
            ];

            $message=get_all_data($table_name,$where);
           
                // print'<pre>';    
                // print_r($all_user);
                // print'</pre>';
        ?>

        <?php
                
                if($message){
                    $sl=1;
                    ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">CONTACT</th>
                                    <th scope="col">DISCRIPTION</th>                                                   
                                    <th scope="col">CREATED AT</th>                                    
                                    <th scope="col">ACTION</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($message as $value){ 
                            
                                       
                                        
                                    
                                        ?>
                                        <tr >
                                            
                                            <th scope="row"><?php echo $sl++?></th>
                                            <td><?php echo $value->name?></td>
                                            <td><?php echo $value->email	?></td>                                                                                   
                                            <td><?php echo $value->contact ?></td>
                                            <td><?php echo $value->discription ?></td>                                                                                
                                            <td><?php echo $value->created_at ?></td>
                                                                                                                                                                                    
                                            <td>
                                                 
                                                 <a href="#" class="btn btn-success" >REPLAY</a>
                                                
                                                
                                            </td>                                                      
                                                                                                  
                                        </tr>
                                    <?php } ?>
                            
                            </tbody>
                        </table>
                    
                    <!-- end of foreach -->

                <?php } ?>

           



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

