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
      <li class="nav-item dropdown">
        <button id="themeDropdownBtn" class="btn btn-sm theme-toggle-btn-navbar dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Select Theme">
          <i class="fas fa-palette"></i> <span id="currentThemeText">Theme: Default</span>
        </button>
        <div class="dropdown-menu theme-dropdown-menu" aria-labelledby="themeDropdownBtn">
          <a class="dropdown-item theme-option" href="#" data-theme="default">
            <i class="fas fa-palette"></i> Default
          </a>
          <a class="dropdown-item theme-option" href="#" data-theme="halloween">
            <i class="fas fa-ghost"></i> Halloween
          </a>
          <a class="dropdown-item theme-option" href="#" data-theme="christmas">
            <i class="fas fa-tree"></i> Christmas
          </a>
        </div>
      </li>
      <li class="dropdown user user-menu">
          <b> <i class="fas fa-user-tie nav-icon"></i> 
          <?php echo $_SESSION['userid'].' - '.$_SESSION['fullname']; ?></b>
      </li>
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
              
              <?php if(isset($_SESSION['confidential']) AND $_SESSION['confidential'] == 1) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>confidential" class="nav-link">
                <i class="nav-icon fa fa-eye-slash"></i>
                  <p>Confidential</p>
                </a>
              </li>
              <?php endif; ?>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>inbox" class="nav-link">
                <i class="nav-icon fa fa-folder-plus"></i>
                  <p>Inbox
                      <span class="badge badge-success right" title="Process">
                        <?php 
                          $i = 0;
                          foreach ($inbox AS $inb) {
                              if ($inb['ts_accepted_date'] != '') {
                                $i++;
                              }
                          }
                          echo $i;
                        ?>
                      </span>
                      <span class="badge badge-primary right" title="Receive">
                        <?php 
                          $i = 0;
                          foreach ($inbox AS $inb) {
                              if ($inb['ts_accepted_date'] == '') {
                                $i++;
                              }
                          }
                          echo $i;
                        ?>  
                      </span>
                  </p>
                </a>
              </li>
              <!-- RED Secretary -->
              <?php if($_SESSION['userid'] == $_SESSION['red_sec'] ) : ?>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>red_inbox" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                    <p>RED Inbox
                        <!-- <span class="badge badge-success right" title="Process">
                          <?php 
                            $i = 0;
                            foreach ($inbox AS $inb) {
                                if ($inb['ts_accepted_date'] != '') {
                                  $i++;
                                }
                            }
                            echo $i;
                          ?>
                        </span>
                        <span class="badge badge-primary right" title="Receive">
                          <?php 
                            $i = 0;
                            foreach ($inbox AS $inb) {
                                if ($inb['ts_accepted_date'] == '') {
                                  $i++;
                                }
                            }
                            echo $i;
                          ?>  
                        </span> -->
                    </p>
                  </a>
                </li>
              <?php endif; ?>
              <!-- RED Secretary End -->
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>outbox" class="nav-link">
                <i class="nav-icon fa fa-folder-open"></i>
                  <p>Outbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>closed" class="nav-link">
                <i class="nav-icon fa fa-folder-closed"></i>
                  <p>Filed/Closed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>notice" class="nav-link">
                <i class="nav-icon fa-solid fa-clipboard"></i>
                  <p>SO/MEMO/NOM</p>
                </a>
              </li>

              <?php if(isset($_SESSION['dms_settings']) AND $_SESSION['dms_settings'] == 1 OR isset($_SESSION['announcements']) AND $_SESSION['announcements'] == 1) : ?>
              <li class="nav-header">Configuration</li>
                <li class="nav-item has-treeview">
                  
                    <?php if(isset($_SESSION['dms_settings']) AND $_SESSION['dms_settings'] == 1) : ?>
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
                    <?php endif; ?>

                    <?php if(isset($_SESSION['announcements']) AND $_SESSION['announcements'] == 1) : ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url(); ?>conf/ann" class="nav-link">
                        <i class="nav-icon fa fa-bullhorn"></i>
                          <p>Bulletin</p>
                        </a>
                      </li>
                    <?php endif; ?>
              </li>
              <?php endif; ?>
            
          </li>
          
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>