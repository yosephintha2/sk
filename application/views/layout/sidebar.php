 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link elevation-4">
      <img src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     <!--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                SK Pribadi
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                SK Bersama
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../kanban.html" class="nav-link">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Cuti
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../kanban.html" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>

          <?php
            if ($page == 'jenis_sk' || $page == 'jatah_cuti' || $page == 'tipe_pengguna'){
              $menu_active = 'active';
              $menu_open = 'menu-is-opening menu-open';
            } else {
              $menu_active = '';
              $menu_open = '';
            }
          ?>
          <li class="nav-item <?php echo $menu_open ?>">
            <a href="#" class="nav-link <?php echo $menu_active ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url().'setting/jenis_sk' ?>" class="nav-link <?php echo ($page == 'jenis_sk') ? 'active':'' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis SK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url().'setting/jatah_cuti' ?>" class="nav-link <?php echo ($page == 'jatah_cuti') ? 'active':'' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jatah Cuti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url().'setting/tipe_pengguna' ?>" class="nav-link <?php echo ($page == 'tipe_pengguna') ? 'active':'' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Pengguna</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>