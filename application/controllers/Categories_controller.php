<?php 
class Categories_controller extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('user_name') == ''){
      redirect('Logins_controller');
    }
    $this->load->model(array('Category_model'));
  }

  public function index(){
    $data['category_data'] = $this->Category_model->category_data_view();



    $this->load->view("Categories/index",$data);
  }
  public function add(){

      $data = array(
            'category_name'=>$this->input->post('category_name'),
          );
      $this->Category_model->Category_Data_insert($data);
      redirect('Categories_controller');
  }

}

?>
