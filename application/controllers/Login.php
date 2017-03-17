<?php
    /**
     *
     */
    class Login extends MY_Controller
    {
      function __construct()
      {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
		    $this->data['id_role']  = $this->session->userdata('id_role');
    		if (isset($this->data['username'], $this->data['id_role']))
    		{
    			switch ($this->data['id_role'])
    			{
    				case 1:
    					redirect('panel');
    					break;
    				case 2:
    					redirect('panel');
    					break;
    			}
    			exit;
    		}

        $this->load->model('Login_m');
      }

      public function index()
      {
        if ($this->POST('masuk')) {
          if(!$this->Login_m->cek_login($this->POST('username'),$this->POST('password'))){
				        $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Username/password anda salah', 'danger');
				        redirect('login');
				        exit;
			    } else {
			      redirect('panel');
			    }
        }
        $this->data['title'] = '.:: Login ::.';
        $this->data['content'] = 'login';
        $this->template($this->data);
      }
    }

 ?>
