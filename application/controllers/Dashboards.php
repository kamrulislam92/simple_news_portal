<?php 
class Dashboards extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('user_name') == ''){
      redirect('Logins_controller');
    }
    $this->load->model(array('Dashboard'));
  }

  public function index(){
    $this->load->view("Dashboard/index");
  }

}

?>
