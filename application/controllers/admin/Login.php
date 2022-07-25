<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public   function __construct() {
        parent::__construct();
        $this->load->model('sign_model');
      }
    public function index (){
        $this->load->view('admin/login');
    }
    public function loginme()
	{
        // print_r($loginme);die;

        
 		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
         $this->form_validation->set_rules('password', 'Password', 'required|trim');

		// $this->form_validation->set_rules('image', 'Image', 'required');
        
		if(	$this->form_validation->run() == false)
		{
           
        }else
        {
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $login_id= $this->sign_model->isvalidate( $email,$password);

           

            // if($this->sign_model->isvalidate( $email,$password))
            if( $login_id)
            {
            
            $this->session->set_userdata('email',$email);
            $this->session->set_userdata('logged_in',true);

            $this->session->set_userdata('sig_id',  $login_id);
             redirect(base_url().'admin/dashboard');
             
            }
            else
            {
                $array_items = array(
                    'email'=>null,
                    'logged_in'=>false,
                    'sig_id'=>false,
                    'email'=>null
                );

                $this->session->unset_userdata($array_items);
                $this->session->set_userdata('sig_id',  $login_id);
                $this->session->set_flashdata('error' , 'Invalid Email/Password');
                redirect(base_url().'admin/login');
            }
        }
    
      
    }
    public function dashboard() {
        $user_id = $this->session->userdata('sig_id');
         
          if(isset($user_id) &&  !empty($user_id)){
            $this->load->model('sign_model');
            $this->load->view('dashboard');
          }else{
            redirect(base_url().'admin/login');
          }
        //  redirect(base_url().'admin/login');
        
     }
    
     function logout()
     {
        $this->session->unset_userdata($array_items); 
         $this->session->sess_destroy();
         redirect(base_url().'admin/login');
         $array_items = array(
             'email'=>null,
             'logged_in'=>false,
             'sig_id'=>false,
             'email'=>null
         );
 
         
         
 
         // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
          
         
 
     }
        


    

}
      
	


?>