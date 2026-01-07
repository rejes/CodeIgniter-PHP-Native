 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="<?=base_Url();?>assets/logo_masjid.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">SISPAMAL-26</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?=base_Url();?>assets/admin_lte/dist/img/account.jpg" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?=$this->session->userdata('username');?></a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <ul class="nav nav-treeview">

                         <li class="nav-item">
                             <a href="<?=base_url();?>Dashboard/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-tachometer-alt"></i>
                                 <p class="text">Dashboard</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?=base_url();?>Kas/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-book"></i>
                                 <p>Kas</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?=base_url();?>Iuran/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>Iuran</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?=base_url();?>Berita/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-info"></i>
                                 <p>Info Berita</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?=base_url();?>Kematian/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-table"></i>
                                 <p>Info Kematian</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?=base_url();?>Pengurus/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-users"></i>
                                 <p>Pengurus</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?=base_url();?>Anggota/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-users"></i>
                                 <p>Anggota</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="<?=base_url();?>Inventory/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-th"></i>
                                 <p>Inventory</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="<?=base_url();?>Settings/view_admin" class="nav-link">
                                 <i class="nav-icon fas fa-cog"></i>
                                 <p>Settings</p>
                             </a>
                         </li>
                     </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>