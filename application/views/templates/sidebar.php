        <!-- Sidebar -->
        <ul class="sidebarr navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('barang/produk'); ?>">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">inventaria</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id`=`user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <?php foreach ($menu as $m) : ?>
                <div class="sidebar-heading">
                    <?= $m['menu']; ?>
                </div>

                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                            FROM `user_sub_menu` 
                            WHERE `menu_id` = $menuId
                            AND `is_active`=1";

                $subMenu = $this->db->query($querySubMenu)->result_array(); ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <!-- Nav Item - Dashboard -->

                        <a class="ling nav-link" href="<?= base_url($sm['url']); ?>">
                            <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                            <span><?= $sm['title']; ?></span></a>
                        </li>
                    <?php endforeach; ?>


                <?php endforeach; ?>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Produk
                </div>

                <li class="nav-item">
                    <a class=" ling nav-link collapsed" href="<?= base_url('barang/produk'); ?>">
                        <!-- <i class="fas fa-fw fa-cog"></i> -->
                        <span>All Product</span>
                    </a>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class=" ling nav-link collapsed" href="<?= base_url('barang/elektronik'); ?>">
                        <!-- <i class="fas fa-fw fa-cog"></i> -->
                        <span>Elektronik</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class=" ling nav-link collapsed" href="<?= base_url('barang/furniture') ?>">

                        <!-- <i class="fas fa-fw fa-wrench"></i> -->
                        <span>Furniture</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="ling nav-link collapsed" href="<?= base_url('barang/transportasi') ?>">

                        <!-- <i class="fas fa-fw fa-wrench"></i> -->
                        <span>Transportasi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="ling nav-link collapsed" href="<?= base_url('barang/aksesoris') ?>">

                        <!-- <i class="fas fa-fw fa-wrench"></i> -->
                        <span>Aksesoris</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    User
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>

            </li> -->

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class=" ling nav-link" href="<?= base_url('barang/user'); ?>">
                        <!-- <i class="fas fa-fw fa-user"></i> -->
                        <span>Profile</span></a>
                </li>

                <li class="nav-item">
                    <a class="ling nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                        <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                        <span>Logout</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>
        <!-- End of Sidebar -->