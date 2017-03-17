<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Total Hasil Penjualan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url('panel/total_penjualan/1')?>">Januari</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/2')?>">Februari</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/3')?>">Maret</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/4')?>">April</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/5')?>">Mei</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/6')?>">Juni</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/7')?>">Juli</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/8')?>">Agustus</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/9')?>">September</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/10')?>">Oktober</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/11')?>">November</a></li>
                        <li><a href="<?= base_url('panel/total_penjualan/12')?>">Desember</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                  <div class="col-xs-12">
                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title">Tabel Penjualan</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body table-responsive">
                              <table id="example2" class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Nama Menu</th>
                                          <th>Harga Satuan</th>
                                          <th>Jumlah Pembelian</th>
                                          <th>Total Pembayaran</th>
                                          <th>Tanggal Transaksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $total_penjualan=0; $i= 1;?>
                                      <?php foreach($list_penjualan as $pesanan):?>
                                      <?php $menu = $this->Menu_m->get_row(['id_menu'=>$pesanan->id_menu]); ?>
                                      <tr>
                                          <td><?= $i?></td>
                                          <td><?= $menu->nama_menu ?></td>
                                          <td><?= $menu->harga?></td>
                                          <td><?= $pesanan->jumlah?></td>
                                          <td><?= $pesanan->jumlah*$menu->harga ?></td>
                                          <td><?= $pesanan->tanggal?></td>
                                      </tr>
                                      <?php $total_penjualan = $total_penjualan+($pesanan->jumlah*$menu->harga); $i++; ?>
                                      <?php endforeach;?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>Jumlah Total</th>
                                          <th></th>
                                          <th></th>
                                          <th></th>
                                          <th>Rp. <?= $total_penjualan?></th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div><!-- /.box-body -->
                      </div><!-- /.box -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
