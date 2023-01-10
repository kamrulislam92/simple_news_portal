<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logins_controller extends CI_Controller {
public function __construct(){
	parent::__construct();
	$this->load->model(array('Login'));
}
	
	public function index()
	{
		$this->load->view('Logins_folder/login');
	}
	public function validate(){

		$this->prepare_validation();

		if(isset($_POST)){
			$data = $this->get_data();

			if($this->form_validation->run()==TRUE){
				$validate_user_data = $this->Login->check_data($data);
				$session_data = array(
					'user_name'=>$validate_user_data->user_name,
					'role_id'=>$validate_user_data->role_id
				);

				 $this->session->set_userdata($session_data);
				redirect('Dashboards');
			}
			else{
				$data = "Oops! Wrong Credential";
				$this->load->view('Logins_folder/login',$data);
			}
		}

	}

public function get_data(){
	$data = array();
	$data['user_name'] = $this->input->post('user_name');
	$data['password']  = $this->input->post('password');
	return $data;
}

	public function prepare_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name','user_name','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		}
}
