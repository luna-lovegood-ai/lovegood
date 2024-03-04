 <!-- Content For Sidebar -->
 <div class="h-100">
                <div class="sidebar-logo">
                    <a href="./">Kasir</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo (isset($_GET['x']) && $_GET['x']=='home' || !isset($_GET['x'])) ? "active link-light bg-secondary" : "" ; ?>" aria-current="page" href="home">
                        <i class="bi bi-house pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo (isset($_GET['x']) && $_GET['x']=='produk') ? "active link-light bg-secondary" : "" ; ?>" aria-current="page" href="produk">
                        <i class="bi bi-grid-fill pe-2"></i>
                            Produk
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo (isset($_GET['x']) && $_GET['x']=='pelanggan') ? "active link-light bg-secondary" : "" ; ?>" href="pelanggan">
                        <i class="bi bi-person-circle pe-2"></i> 
                            Pelanggan
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo (isset($_GET['x']) && $_GET['x']=='penjualan') ? "active link-light bg-secondary" : "" ; ?>" href="penjualan">
                        <i class="bi bi-cart2 pe-2"></i> 
                            Penjualan
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo (isset($_GET['x']) && $_GET['x']=='user') ? "active link-light bg-secondary" : "" ; ?>" href="user">
                        <i class="bi bi-person-vcard pe-2"></i> 
                            User
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo (isset($_GET['x']) && $_GET['x']=='datapjln') ? "active bg-secondary" : "" ; ?>" href="datapjln">
                        <i class="bi bi-list pe-2"></i> 
                            Data Penjualan
                        </a>
                    </li>

                </ul>
            </div>