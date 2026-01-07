<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('Admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>VILLA</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/Kamar_kelas') ?>">KELAS VILLA</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/Kamar') ?>">VILLA</a>
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>PEMESANAN</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/new_reservasi') ?>">PEMESANAN BARU</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/all_reservasi') ?>">PEMESANAN SELESAI</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/saran') ?>">
            <i class="fas fa-fw fa-envelope-open"></i>
            <span>KRITIK & SARAN</span></a>
    </li>
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
            <i class="fas fa-fw fa-cog"></i>
            <span>PENGATURAN</span></a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/user') ?>">USER</a>
        </div>
    </li>
</ul>