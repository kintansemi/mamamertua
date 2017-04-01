<?php
    /**
     * 
     */
    class Nota_pembayaran_m extends MY_Model
    {
        
        function __construct()
        {
            parent::__construct();
            $this->data['primary_key'] = 'id_nota';
            $this->data['table_name'] = 'nota_pembayaran';
        }
    }
    