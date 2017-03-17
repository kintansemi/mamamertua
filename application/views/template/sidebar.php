<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!--<div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url('assets/AdminLTE/img/avatar3.png')?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                  <?php $data = $this->User_data->get_row(['username'=>$this->session->userdata('username')]) ?>
                    <p>Hello, <?= $data->nama ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>-->

<!-- sidebar menu: : style can be found in sidebar.less -->
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
                                <?php if($this->session->userdata('id_role')== 1):?>
                                <li><a href="<?= base_url('panel/total_penjualan')?>"><i class="fa fa-angle-double-right"></i> Total Penjualan</a></li>
                                <?php endif; ?>
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
