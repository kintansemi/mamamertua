<?php
	$data['title'] = $title;
	$blacklist_uri 	= ['login', 'register'];
	$class_name 	= $this->router->fetch_class();
	$this->load->view('template/header', $data);
	if (!in_array($class_name, $blacklist_uri))
	$this->load->view('template/navbar');
	if (!in_array($class_name, $blacklist_uri))
	$this->load->view('template/sidebar');
	$this->load->view($content);
	$this->load->view('template/footer', ['blacklist' => $blacklist_uri, 'class_name' => $class_name]);
?>
