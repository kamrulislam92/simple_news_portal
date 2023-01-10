<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function check_data($data){
    // $this->db->select('*');
    // $this->db->from('user');
    // $this->db->where('id',$data);
    // $data1 = $this->db->get();
    // $dataa = $data1->row();
    $query = $this->db->query("SELECT * FROM user WHERE user_name='$data[user_name]' AND password ='$data[password]'")->row();

    return $query;
  }
}
