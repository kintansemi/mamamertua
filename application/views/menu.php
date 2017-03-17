<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Daftar Menu
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                  <!-- left column -->
                  <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Daftar Menu</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Menu</th>
                                            <th>Nama Menu</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1; foreach($list_menu as $menu): ?>
                                        <tr>
                                            <td><?= $i?></td>
                                            <td><?= $menu->id_menu ?></td>
                                            <td><?= $menu->nama_menu ?></td>
                                            <td><?= $menu->harga ?></td>
                                            <td>Tersedia</td>
                                            <td><a href="<?= base_url('panel/delete_menu/'.$menu->id_menu)?>"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                                              <a href="<?= base_url('panel/edit_menu/'.$menu->id_menu)?>"><button class="btn btn-success" ><i class="fa fa-pencil" style="color: white;!important"></i></button>
                                            </td>
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th>No.</th>
                                          <th>Kode Menu</th>
                                          <th>Nama Menu</th>
                                          <th>Harga</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                    <a href="<?= base_url('panel/tambah_menu')?>"><button class="btn btn-primary btn-sm btn-round"><i class="fa fa-plus"></i> Add New</button></a>
                                </div>
                        </div><!-- /.box -->
                      </div>
                   </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->