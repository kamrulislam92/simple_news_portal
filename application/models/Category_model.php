<?php 
class Category_model extends CI_Model {

  //   function Category_Data_insert($data){
  //     $this->db->insert('category',$data);
  // }

    public function add_data_info($data){

      return $this->db->insert('category',$data);

    }

    public function category_data_view()
      {
        // system_1 
          // $query = $this->db->get('category');

        // System_2 
          // $query = $this->db->query("SELECT * FROM category ORDER BY id DESC");
          
        // System_3
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        
          return $query;
      }
    public function get_category_by($id){
      if(!empty($id)){
        $query = $this->db->query("SELECT * FROM category WHERE id=$id ")->result();
        // echo "<pre>";print_r($query);die();
        return $query;
      }
    }

    public function get_update_catInfo($data){
      $this->db->where('id',$data['id']);
      $query = $this->db->update('category',$data);
      return $query;
    }
    public function delete_category_data($id){
      $this->db->where('id',$id);
      $query = $this->db->delete('category');
      return $query;

    }

}

?>
