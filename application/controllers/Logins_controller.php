<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logins_controller extends CI_Controller {
public function __construct(){
	parent::__construct();
	$this->load->model(array('Login_model'));
}
	
	public function index()
	{
		$this->load->view('Logins_folder/login');
	}
	
}
