<?php
                    $tabe_name = 'product_order';
                    $where=[
                        'oder_status'=>'no_dalivered'

                    ]; 
                                       
                    $data = get_table_total_row_count($tabe_name,$where);




                    $tabe_name = 'ask_question';
                    $cloum=['replay_status'];
                    $slect=get_data($tabe_name,$cloum);

                    $where=[
                      'replay_status'=>'not_success',
                      
                    ] ;                    
                    $messeage = get_table_total_row_count($tabe_name,$where);

  ?>
 
 
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="dasbord.php" class="nav-link">Home</a>
     </li>

     <li class="nav-item d-none d-sm-inline-block">
       <a href="shop.php" class="nav-link">Shop</a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="admin_registration.php" class="nav-link">Add User</a>
     </li>
     
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <!-- Navbar Search -->
     <li class="nav-item">
       <a class="nav-link" data-widget="navbar-search" href="#" role="button">
         <i class="fas fa-search"></i>
       </a>
       <div class="navbar-search-block">
         <form class="form-inline">
           <div class="input-group input-group-sm">
             <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
             <div class="input-group-append">
               <button class="btn btn-navbar" type="submit">
                 <i class="fas fa-search"></i>
               </button>
               <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                 <i class="fas fa-times"></i>
               </button>
             </div>
           </div>
         </form>
       </div>
     </li>

     <!-- Messages Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-comments"></i>
         <span class="badge badge-danger navbar-badge"><?php
         if($slect->replay_status=='not_success'){
          echo $messeage ;

         }else{
          echo '0' ;


         } 
         
         
         
         ?></span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <a href="#" class="dropdown-item">
           <!-- Message Start -->
           <div class="media">
             
             <div class="media-body">
               <h3 class="dropdown-item-title">
               <?php echo $messeage ?>  Message
                 
                 <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
               </h3>
              
             </div>
           </div>
           <!-- Message End -->
         </a>
         
       </div>
     </li>
     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-bell"></i>
         <span class="badge badge-warning navbar-badge"><?php print $data  ?></span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <span class="dropdown-item dropdown-header"><?php print $data  ?> Notifications</span>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
          <i class="fa-solid fa-gift"></i> <?php print $data  ?> New Order
           
         </a>
         
         
       </div>
     </li>
     <li class="nav-item">
       <a class="nav-link" data-widget="fullscreen" href="#" role="button">
         <i class="fas fa-expand-arrows-alt"></i>
       </a>
     </li>

   </ul>
 </nav>
 <!-- /.navbar -->

 
