<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    

    // public function () {
    //     $this->load->view('admin/signup');
    // }
    public function index (){
        $this->load->view('admin/signup');
    }
//     public function insertinto()
//  {
//     // $this->load->model('sign_model');
//     // $this->form_validation->set_rules('first_name', 'First name', 'required');
//     // $this->form_validation->set_rules('last_name', 'Last name', 'required');
//     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[signup.email]');
//     $this->form_validation->set_rules('password', 'Password', 'required|matches[rpassword]');
//     $this->form_validation->set_rules('rpassword', 'reepassword', 'required');
//     $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

//     if ($this->form_validation->run()) {
//         // $first_name = $this->input->post('first_name');
//         // $last_name = $this->input->post('last_name'); 
//         $email =  $this->input->post('email');
//         $password = $this->input->post('password');
//         $date_created = date('Y-m-d H:i:s');
//         // $date_updated = date('Y-m-d H:i:s');
//         $verification_key = md5($email);
//         $active = 0;
//         $this->load->model('sign_model');
//         // Create account
//         if ($this->Usermodel->user_register($email, $password, $date_created,)) {
//             $this->session->set_flashdata("signup_sucess", "Your account was created. Your have to activate it before you can signin. We have send you an activation email at $email.");
//         } else {
//             $this->session->set_flashdata("signup_failure", "We ware unable to create your account");
//         }
//         redirect('login'); 
//     } else {
//         $this->load->view('admin/login');
//         // if ($email_exists) {
//         //     $this->session->set_flashdata("email_exists", "The email address you provided already exists. Please signup.");
//         }
//     }

// 'trim|required|min_length[6]|max_length[25]|matches[conf_password]|xss_clean|callback_is_password_strong'

    public function insertinto ()
	{
		$this->load->model('sign_model');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[signup.email]');
        $this->form_validation->set_message('is_unique', 'The %s is already taken');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[10]|max_length[25]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'required');
		
		if(	$this->form_validation->run() == False)
		{
			$this->index();
		}else{

			$insertArray = array();
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
			$insertArray['email'] = $this->input->post('email');
			$insertArray['password'] = hash('md4',$password);
			$insertArray['cpassword'] = hash('md4',$cpassword);
			$insertArray['created_at'] = date('y-m-d');
			$this->sign_model->index($insertArray);
			$this->session->set_flashdata('success' , 'Your Signup Successfull!');
			redirect(base_url().'admin/signup/login');
		}
    }
        public function login() {
			$this->load->model('sign_model');
            $this->load->view('admin/login');
        }
    
		
	}



    
    
    


?>