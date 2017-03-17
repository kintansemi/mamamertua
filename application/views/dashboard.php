<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard Penjualan
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                  <!-- left column -->
                  <div class="row">

                  
                      
                  <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="box box-primary">
                          <div class="box-header">
                              <h3 class="box-title">Input Pesanan</h3>
                          </div><!-- /.box-header -->
                          <!-- form start -->
                          <?= form_open('panel')?>
                              <div class="box-body">
                                <?= $this->session->flashdata('msg') ?>
                                <div class="form-group">
                                  <div>
                                        <div class="test-case showback">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kode Menu</label>
                                                    <input type="text" name="kode" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Jumlah Pembelian</label>
                                                    <input type="text" name="jumlah" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div><!-- /.box-body -->
                              <div class="box-footer">
                                  <button type="submit" class="btn btn-primary" name="submit" value="submit">submit</button>
                              </div>
                          <?= form_close() ?>
                      </div><!-- /.box -->
                      </div> 
                      <div class="col-md-6">
                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title">Tagihan</h3>
                          </div><!-- /.box-header -->
                          <a href="<?= base_url('panel/cetak_resi')?>" target="_blank"><button class="btn btn-primary btn-sm btn-round" >Cetak</button></a>
                          <button class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Bayar</button>
                          <div class="box-body no-padding">
                            <?= $this->session->flashdata('msg_trans') ?>
                              <table class="table table-condensed">
                                  <tr>
                                      <th>#</th>
                                      <th>Pesanan</th>
                                      <th>Jumlah</th>
                                      <th>Harga</th>
                                  </tr>
                                  <?php $i = 1; $total = 0; ?>
                                  <?php foreach ($list_pesanan as $pesanan): ?>
                                    <?php $menu= $this->Menu_m->get_row(['id_menu'=> $pesanan->id_menu]);?>
                                  <tr>
                                      <td><?= $i ?></td>
                                      <td><?= $menu->nama_menu ?></td>
                                      <td><?= $pesanan->jumlah ?></td>
                                      <td>Rp. <?= $menu->harga ?></td>
                                  </tr>
                                  <?php $i++; $total = $total + ($pesanan->jumlah*$menu->harga); ?>
                                <?php endforeach; ?>
                                  <tr>
                                      <td>Total Pembayaran</td>
                                      <td></td>
                                      <td></td>
                                      <td>Rp. <?= $total ?></td>
                                  </tr>
                                  <?php $kembalian; $resi = $this->Resi_m->get_row(['status'=>'belum']);
                                        if(isset($resi)){
                                            $uang = $resi->uang;
                                        } else {
                                            $uang = 0;
                                        }
                                        if($uang >= $total){
                                           $kembalian =  $uang - $total;
                                        } else {
                                            $kembalian = 0;
                                        }
                                         ?>
                                  <tr>
                                      <td>Uang</td>
                                      <td></td>
                                      <td></td>
                                      <td>Rp. <?= $uang ?></td>
                                  </tr>
                                  <tr>
                                      <td>Kembalian</td>
                                      <td></td>
                                      <td></td>
                                      <td>Rp. <?= $kembalian ?></td>
                                  </tr>
                              </table>

                          </div><!-- /.box-body -->
                      </div><!-- /.box -->
                      <div class="box-footer">
                      <a href="<?= base_url('panel/cancel')?>"><button type="submit" class="btn" name="cancel" value="cancel">Cancel</button></a>
                      <a href="<?= base_url('panel/pembayaran')?>"><button class="btn btn-primary" >Selesai</button></a>
                      </div>
                      </div>
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
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                      </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <?= form_open('panel') ?>
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row mt">
                      <div class="col-lg-12">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Jumlah Uang</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="uang">
                            </div>
                        </div>
                      </div><!-- col-lg-12-->       
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" name="uangmasuk" value="submit" class="btn btn-primary">
                  </div>
                  <?= form_close() ?>
                </div>
              </div>
            </div> 
