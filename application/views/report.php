<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Report</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url('assets/AdminLTE/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url('assets/AdminLTE/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?= base_url('assets/AdminLTE/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url('assets/AdminLTE/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
    </head>
<body>
Klik untuk melanjutkan cetak. <br>
<button id='mybtn' onclick="myFunction()">Cetak</button>
<script>
function myFunction() {
    window.print();
}
</script>
<div class="container">
  <h2>Data Penjualan</h2>
  <?php date_default_timezone_set("Asia/Jakarta"); ?>
  <p>Laporan dicetak pada: <?= date('d/m/Y') ?></p>            
  <table class="table table-bordered">
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
</div>
</body>
</html>