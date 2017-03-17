<?php
    /**
     *
     */
    class Menu_m extends MY_Model
    {

      function __construct()
      {
        parent::__construct();
        $this->data['primary_key'] = 'id_menu';
        $this->data['table_name'] = 'menu';
      }
    }

 ?>
