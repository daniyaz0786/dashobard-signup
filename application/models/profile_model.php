<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    function insertinto ($insertArray){

        $this->db->insert('profile',$insertArray);
     
 }
 
//     function profileimage ($insertArray){

//         $this->db->insert('profile',$insertArray);
     
//  }

 function all()
 {
    return $users = $this->db->get('signup')->result_array();
 }

 public function find ($sig_id){

    /*$q = $this->db->where(['sig_id'=>$sig_id])->get('signup');*/
    $this->db->select('signup.*,profile.*');
    $this->db->from('signup');
    $this->db->where('signup.sig_id', $sig_id);
    $this->db->join('profile', 'profile.signup_id = signup.sig_id', 'left');
    $query=$this->db->get(); 
    $resultdata = $query->result_array();
    if(!empty($resultdata))
    {
        $result = $resultdata[0];
    }else
    {
        $result =  array();
    }
    return  $result ;

 }
//  public function profile() {
//     $sig_id =  $this->session->userdata('sig_id');
//     $this->db->select('')

//  }







}
?>