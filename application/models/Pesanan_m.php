<?php
    /**
     * 
     */
    class Pesanan_m extends MY_Model
    {
        
        function __construct()
        {
            parent::__construct();
            $this->data['primary_key'] = 'id_pesanan';
            $this->data['table_name'] = 'pesanan';
        }
    }
    