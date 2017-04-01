<?php

class Login_m extends MY_Model{
	public function __construct(){
		parent::__construct();
	}

	public function cek_login($username,$password){
		if($username == 'kasir' && $password == 'mamamertuaoke'){
			$user_session = [
				'username'	=> 'kasir',
				'id_role'	=> '1'
			];
			$this->session->set_userdata($user_session);
			return true;
		}
		return false;
	}
}
