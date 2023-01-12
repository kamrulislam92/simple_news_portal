<?php 
class Category_model extends CI_Model {

  function Category_Data_insert($data){
    $this->db->insert('category',$data);
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

}

?>
