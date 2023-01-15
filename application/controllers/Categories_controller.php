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
        $data = array();
        $data['title'] = "Category List";
        $data['head_line'] = "Manage_category / Category";
        $data['category_data'] = $this->Category_model->category_data_view();

        $this->load->view("Categories/index",$data);
      }
      // public function add(){

      //     $data = array(
      //           'category_name'=>$this->input->post('category_name'),
      //         );
      //     $this->Category_model->Category_Data_insert($data);
      //     redirect('Categories_controller');
      // }

      public function add(){
        $this->prepare_validation();
        if(isset($_POST)){
          $data = $this->get_posted_data();
          if($this->form_validation->run() == TRUE){

            if($this->Category_model->add_data_info($data)){

              $this->session->set_flashdata('success',ADD_MESSAGE);

            }else{

              $this->session->set_flashdata('warning',WARNING_MESSAGE);

            }
            redirect('Categories_controller/index');


            }else{
              redirect('Categories_controller');
          }
        }
      
    }
    public function get_posted_data(){
      $data = array();
      $data['category_name'] = $this->input->post('category_name');
      return $data;
    }
    public function prepare_validation(){
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<div class="error">','</div>');
      $this->form_validation->set_rules('category_name','category_name','trim|required');
    }
    public function edit(){
      $id = $this->input->post('id');
      $callback_message = array();
      $get_category_info = $this->Category_model->get_category_by($id);
      // echo "<pre>";print_r($get_category_info);die();
      foreach($get_category_info as $info){
        $callback_message['category_name'] = $info->category_name;
        $callback_message['id'] = $info->id;
      }
      echo json_encode($callback_message);
    }
    public function uplade(){
      if(isset($_POST)){
        $data = $this->get_posted_data();
        $data['id'] = $this->input->post('id');
        if($this->Category_model->get_update_catInfo($data)){
          $this->session->set_flashdata('success',UPDATE_MESSAGE);
        }else{
          $this->session->set_flashdata('warning',WARNING_MESSAGE);
        }
        redirect('Categories_controller/index');
      }
    }
    public function delete($id){
      if(!empty($id)){
        if($this->Category_model->delete_category_data($id)){
          $this->session->set_flashdata('delete',DELETE_MESSAGE);
        }else{
          $this->session->set_flashdata('warning',WARNING_MESSAGE);
        }
        redirect('Categories_controller/index');
      }else{
        redirect('Categories_controller');
      }
    }
}

?>
