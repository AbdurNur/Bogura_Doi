<!-- Main Sidebar Container -->
<aside class="main-sidebar  sidebar-light-white elevation-4  bg-success">
  

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="theme/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <?php

        if(isset($_SESSION['login_user_type']) && $_SESSION['login_user_type']==1 ){ ?>
        <a href="#" class="d-block text-light">Admin <?php echo $_SESSION['login_name']?></a>

       <?php }elseif(isset($_SESSION['login_user_type']) && $_SESSION['login_user_type']==2 ){?>
        <a href="#" class="d-block text-light">Maneger <?php echo $_SESSION['login_name']?></a>


        <?php }elseif(isset($_SESSION['login_user_type']) && $_SESSION['login_user_type']==3 ){?>
          <a href="#" class="d-block text-light">Service Man <?php echo $_SESSION['login_name']?></a>


        <?php  }
        
        
      ?>
        
      </div>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header text-light">LABELS</li>

        <?php if(isset($_SESSION['login_user_type']) && $_SESSION['login_user_type']=='1'){?> 
          <li class="nav-item ">

              
            <a href="#" class="nav-link text-light">
              <i class="fa-solid fa-users"></i>
              <p>
                All User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all_users.php" class="nav-link text-light">
                  <i class="fa-solid fa-people-group"></i>
                  <p>Generel User</p>
                </a>
              </li>

            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="staff.php" class="nav-link text-light">
                  <i class="fa-solid fa-clipboard-user"></i>
                  <p>STAFF</p>
                </a>
              </li>

            </ul>
          </li>
        <?php }?>
          <li class="nav-item ">
            <a href="#" class="nav-link text-light">
              <i class="fa-solid fa-box-open"></i>
              <p>
                All ORDER
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
              <?php if($_SESSION['login_user_type']=='1' || $_SESSION['login_user_type']=='2'){?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="new_order.php" class="nav-link text-light">
                      <i class="fa-solid fa-cart-plus"></i>
                      <p>NEW ORDWE</p>
                    </a>
                  </li>

                </ul>
              <?php }  ?>
              
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pending_order.php" class="nav-link text-light">
                  <i class="fa-solid fa-square-arrow-up-right"></i>
                  <p>PENDING</p>
                </a>
              </li>

            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="success_order.php" class="nav-link text-light">
                  <i class="fa-solid fa-circle-check"></i>
                  <p>SUCESS</p>
                </a>
              </li>

            </ul>
          </li>
          <?php
            if($_SESSION['login_user_type']=='1'|| $_SESSION['login_user_type']=='2'){?>
            
              <li class="nav-item">
                <a href="stock.php" class="nav-link text-light">
                  <i class="fa-solid fa-cubes-stacked"></i>
                  <p>Stock</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="add_stock.php" class="nav-link text-light">
                  <i class="fa-solid fa-square-plus"></i>
                  <p>Add Stock</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="add_view_product.php" class="nav-link text-light">
                  <i class="fa-solid fa-square-plus"></i>
                  <p>Add View Produt </p>
                </a>
              </li>



              <?php  
            }
          
          ?>

        <li class="nav-item">
          <a href="#" class="nav-link text-light">
            <i class="fa-solid fa-user"></i>
            <p>PROFILE </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../logut.php" class="nav-link text-light">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>Log Out</p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>