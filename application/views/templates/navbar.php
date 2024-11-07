<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>dashboard" class="nav-link">Online Document Tracking System version 5</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    
      <li class="dropdown user user-menu">
          <b> <i class="fas fa-user-tie nav-icon"></i> 
          <?php echo $_SESSION['userid'].' - '.$_SESSION['fullname']; ?></b>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>dashboard" class="brand-link">
      <img src="<?php echo base_url()."assets/"; ?>denr-logo.png" alt="Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size:14px">ODTS v5</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  

          <li class="nav-item">
              <a href="https://denrncrsys.online/index.php" class="nav-link">
                <i class="nav-icon fas fa-arrow-left"></i>
                <p>
                  DNIIS
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>dashboard" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-header">Documents</li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>all" class="nav-link">
                <i class="nav-icon fa fa-folder"></i>
                  <p>All Transactions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>inbox" class="nav-link">
                <i class="nav-icon fa fa-folder-plus"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>outbox" class="nav-link">
                <i class="nav-icon fa fa-folder-open"></i>
                  <p>Outbox</p>
                </a>
              </li>

              <li class="nav-header">Configuration</li>
                <li class="nav-item has-treeview">
                  
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-gear"></i>
                      <p>
                        DMS Settings
                        <i class="fas fa-angle-list right"></i>
                      </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo base_url(); ?>conf/category" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                          <p>Category/Action</p>
                        </a>
                      </li>
                      

                    </ul>
              </li>
            
          </li>
          
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>