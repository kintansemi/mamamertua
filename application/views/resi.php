No. Nota: <?= $resi->id_pesanan ?> <br>
Pesanan: <br>
<ol>
    <?php $total=0; foreach($list_pesanan as $pesanan ): ?>
    <?php $menu= $this->Menu_m->get_row(['id_menu'=> $pesanan->id_menu]);?>
    <li><?= $menu->nama_menu ?> | Jumlah(<?= $pesanan->jumlah ?>) | Harga Satuan(Rp. <?= $menu->harga ?>)</li>
    <?php $total = $total + ($pesanan->jumlah*$menu->harga); ?>
    <?php endforeach; ?>
</ol>
Total: <?= $total ?> <br/>