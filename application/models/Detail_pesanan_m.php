<?php
    /**
     *
     */
    class Detail_pesanan_m extends MY_Model
    {

      function __construct()
      {
        parent::__construct();
        $this->data['primary_key'] = 'id_detailpesanan';
        $this->data['table_name'] = 'detail_pesanan';
        date_default_timezone_set("Asia/Jakarta");
      }
      public function ClearPesanan()
      {
        $this->db->empty_table($this->data['table_name']);
      }

      public function penjualan_bulan($bulan){
        $query = $this->db->query('SELECT * FROM '.$this->data['table_name'].' WHERE MONTH(tanggal)='.$bulan);
        return $query->result();
      }
    }

 ?>
