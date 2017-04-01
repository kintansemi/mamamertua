<!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../../index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Mama Mertua
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <?php if($this->session->userdata('id_role')== 1):?>
                                <span>Ownner Mama Mertua<i class="caret"></i></span>
                                <?php else:?>
                                <span>Kasir Mama Mertua<i class="caret"></i></span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <!--<li class="user-header bg-light-blue">
                                    <img src="<?= base_url('assets/AdminLTE/img/avatar3.png')?>" class="img-circle" alt="User Image" />
                                    <p>

                                        <?= $data->nama ?>
                                        <small><?= $data->alamat ?></small>
                                    </p>
                                </li>-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?= base_url('panel/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
