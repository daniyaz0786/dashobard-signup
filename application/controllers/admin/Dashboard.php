<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public   function __construct() {
        parent::__construct();
        $this->check_login();
      }
      


    public function index (){
        // $this->load->view('admin/dashboard');
    }
    public function check_login (){

       
        
        if ($this->session->userdata('logged_in')) {
            $this->load->view('admin/template/header');    
            $this->load->view('admin/template/content');
            $this->load->view('admin/template/footer');
    
        } else {
            redirect(base_url().'admin/login');
        }
    }

    // function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect(base_url().'admin/login');
        // $array_items = array(
        //     'email'=>null,
        //     'logged_in'=>false,
        //     'sig_id'=>false,
        //     'email'=>null
        // );

        // $this->session->unset_userdata($array_items); 
        

        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
         
        

    // }
    // public function list(){
    //     $this->load->view('admin/list');

    // }
}

?>