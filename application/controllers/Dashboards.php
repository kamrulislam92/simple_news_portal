<?php 
class Dashboards extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model(array('Dashboard'));
  }

  public function index(){
    $this->load->view("Dashboard/index");
  }

}

?>
