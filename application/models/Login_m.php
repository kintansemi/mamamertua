<?php

class Login_m extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->data['table_name'] 	= 'user';
    	$this->data['primary_key']	= 'username';
	}

	public function cek_login($username,$password){
		$user_data = $this->get_row(['username'=>$username,'password'=>md5($password)]);
		if(isset($user_data)){
			$user_session = [
				'username'	=> $user_data->username,
				'id_role'	=> $user_data->id_role
			];
			$this->session->set_userdata($user_session);
			return true;
		}
		return false;
	}
}
