<?php
    /**
     * 
     */
    class Resi_m extends MY_Model
    {
        
        function __construct()
        {
            parent::__construct();
            $this->data['primary_key'] = 'no_resi';
            $this->data['table_name'] = 'resi';
        }
    }
    