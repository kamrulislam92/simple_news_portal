<?php

class Login_model extends CI_Model{

  public function user_check_model($data){
    // $this->db->SELECT('*');
    // $this->db->FROM('user');
    // $this->db->WHERE('id','$data');
    // $query = $this->db->get();
    // $query_data = $query->row();

    $query = $this->db->query("SELECT * FROM user WHERE user_name='$data[user_name]' AND password ='$data[password]'")->row();

    return $query;
  }
}
