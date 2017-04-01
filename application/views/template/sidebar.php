<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?= base_url()?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Data Penjualan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('panel/penjualan')?>"><i class="fa fa-angle-double-right"></i> Harian</a></li>
                                <li><a href="<?= base_url('panel/total_penjualan')?>"><i class="fa fa-angle-double-right"></i> Total Penjualan</a></li>
                                <li><a href="<?= base_url('panel/cetakreport')?>"><i class="fa fa-angle-double-right"></i> Cetak Laporan</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i>
                                <span>Menu</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('panel/menu')?>"><i class="fa fa-angle-double-right"></i> Daftar Menu</a></li>
                                <li><a href="<?= base_url('panel/tambah_menu')?>"><i class="fa fa-angle-double-right"></i> Tambah Menu</a></li>
                            </ul>
                        </li>
                        <!--<?php if($this->session->userdata('id_role')== 1):?>
                        <li>
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Edit Data Login</span>
                            </a>
                        </li>
                        <?php endif; ?>-->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
