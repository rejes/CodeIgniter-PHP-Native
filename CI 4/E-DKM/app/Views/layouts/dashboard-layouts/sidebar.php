<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[1] ?? 'index';
$uri2 = $uri[2] ?? '';
$uri3 = $uri[3] ?? '';
?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <h3><i class="bi bi-book"></i> Ar - Rahman</h3>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?= ($uri1 == 'index') ? 'active' : '' ?> ">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sidebar-item <?= ($uri1 == 'pengurus') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Pengurus</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'pengurus') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri1 == 'pengurus') ? 'active' : '' ?>">
                            <a href="/dashboard/pengurus">Daftar Pengurus</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'tambah-pengurus') ? 'active' : '' ?>">
                            <a href="/dashboard/pengurus/tambah-pengurus">Tambah Pengurus</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'sumbangan') ? 'active' : '' ?> ">
                    <a href="/dashboard/sumbangan" class='sidebar-link'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                        </svg>
                        <span>Sumbangan</span>
                    </a>
                </li>
                
                <li class="sidebar-item <?= ($uri1 == 'galeri') ? 'active' : '' ?> ">
                    <a href="/dashboard/galeri" class='sidebar-link'>
                        <i class="bi bi-images"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                <?php if(session()->get('role_level') == 1) : ?>
                <li class="sidebar-item <?= ($uri1 == 'kategori-foto') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-tags"></i>
                        <span>Kategori Foto</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?= ($uri1 == 'kategori-foto' && $uri2 != 'tambah') ? 'active' : '' ?>">
                            <a href="/dashboard/kategori-foto">Kelola Kategori</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'tambah') ? 'active' : '' ?>">
                            <a href="/dashboard/kategori-foto/tambah">Tambah Kategori</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="sidebar-item <?= ($uri1 == 'laporan-keuangan') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-journal-text"></i>
                        <span>Laporan Keuangan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?= ($uri1 == 'laporan-keuangan') ? 'active' : '' ?>">
                            <a href="/dashboard/laporan-keuangan">Daftar Laporan</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'tambah-laporan') ? 'active' : '' ?>">
                            <a href="/dashboard/laporan-keuangan/tambah-laporan">Tambah Laporan</a>
                        </li>
                    </ul>
                </li>
                
                <li class="sidebar-title">Admin</li>

                <?php if(session()->get('role_level') == 1) : ?>
                    <li class="sidebar-item <?= ($uri1 == 'admin') ? 'active' : '' ?>">
                        <a href="/dashboard/admin" class='sidebar-link'>
                            <i class="bi bi-person-badge"></i>
                            <span>Kelola Admin</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(session()->get('role_level') == 2) : ?>
                <li class="sidebar-item <?= ($uri2 == 'edit-profile') ? 'active' : '' ?>">
                    <a href="/dashboard/admin/edit-profile" class='sidebar-link'>
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit Profile</span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="sidebar-item <?= ($uri1 == 'change-password') ? 'active' : '' ?>">
                    <a href="/dashboard/change-password" class='sidebar-link'>
                        <i class="bi bi-key"></i>
                        <span>Ubah password</span>
                    </a>
                </li>

                <li class="sidebar-item mt-3">
                    <form action="/auth/logout">
                        <button type="submit" class="sidebar-link border-0 bg-transparent" style="outline: none;">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
                
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
