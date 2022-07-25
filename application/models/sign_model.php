<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_model extends CI_Model
{
    function index ($insertArray){

        $this->db->insert('signup',$insertArray);
     
 }
      public function isvalidate($username,$password)
      {
          $q=$this->db->where(['email'=>$username,'password'=>$password])
              ->get('signup');
              
                 

              if($q->num_rows())
              {
                  return $q->row()->sig_id;
              }
              else
              {
                return false;
              }


      }

}
?>




<!-- public function login($username, $enc_password)
{
    $this->db->where('username', $username);
    $this->db->where("password", $enc_password);
    $this->db->where("password2", $enc_password);

    $query = $this->db->get($this->table);

    $hashed_password = $enc_password;

    if (password_verify($hashed_password, $hashed_password)) {
        return $query->row();
    } else {
        return false;
    }
} -->