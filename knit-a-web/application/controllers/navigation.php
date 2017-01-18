<?php

class navigation extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
	}
	
	public function index(){		

		$this->load->view('templates/header');
		$this->load->view('navbar/tabs');
		$this->load->view('navbar/tabalign');
		$this->load->view('navbar/pills');
	}
}

?>