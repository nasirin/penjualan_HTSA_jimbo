<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/img/logo 2.png" alt="AdminLTE Logo" class="brand-image bg-white img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HTSA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords(session()->get('username')); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link <?= ($active == 'home') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pesanan" class="nav-link <?= ($active == 'pesanan') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Pesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/produk" class="nav-link <?= ($active == 'produk') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/promo" class="nav-link <?= ($active == 'promo') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Promo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/department" class="nav-link <?= ($active == 'department') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Department
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user" class="nav-link <?= ($active == 'user') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/auth/logout" class="nav-link" onclick="return confirm('apakah anda yakin?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>