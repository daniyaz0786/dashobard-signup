<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

  class User_model extends  CI_model {
    function create ($insertArray){

         $this->db->insert('stform',$insertArray);
      
  }
  function all(){
   return $users = $this->db->get('stform')->result_array();
  }

  
  function getUser($userId) {
    $this->db->where('st_id', $userId);
    return $users = $this->db->get("stform")->row_array();

}
// public function deleteusers($userId){
//   $this->db->where('st_id', $userId);
//   $this->db->delete('stform');
  
  
// }
public function deleteusers($userId){
  $this->db->where('st_id', $userId);
  $this->db->delete('stform');
}



public function updateusers($userId,$formArray){
  $this->db->where('st_id', $userId);
  $this->db->update('stform',$formArray);
 $result =  $this->db->affected_rows();
 return  $result ;
}

}


  
    
 
?>




