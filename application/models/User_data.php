<?php
    /**
     *
     */
    class User_data extends MY_Model
    {

      function __construct()
      {
      		parent::__construct();
      		$this->data['table_name'] 	= 'user_data';
          $this->data['primary_key']	= 'username';
      }
    }

 ?>
