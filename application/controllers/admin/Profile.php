<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index(){
            $this->load->model('profile_model');
            
            $sig_id =  $this->session->userdata('sig_id');
             
          
			$data['admin'] = array();
			$resutl_get  = $this->profile_model->find($sig_id);
			$data['admin'] = $resutl_get;
				// echo "<pre>";
				// print_r($resutl_get);
				// die;
            $this->load->view('admin/template/header');
            $this->load->view('admin/profile', $data);     
            // $this->load->view('admin/profilefooter');   
               
    }
    // public function insertinto(){
		
    //     $this->load->model('profile_model');
	// 	$this->form_validation->set_rules('fullname', ' Full Name', 'required');
	// 	$this->form_validation->set_rules('bio', 'Bio', 'required');
	// 	$this->form_validation->set_rules('mobilenumber', 'Mobile Number', 'required');
	// 	$this->form_validation->set_rules('address', 'Address', 'required');
	// 	// $this->form_validation->set_rules('image', 'Image', 'required');
		
	// 	if(	$this->form_validation->run() == False)
	// 	{
	// 		$this->index();
	// 	}else{
	// 		$insertArray = array();
			

			

	// 		$insertArray['fullname'] = $this->input->post('fullname');
	// 		$insertArray['bio'] = $this->input->post('bio');
	// 		$insertArray['mobilenumber'] = $this->input->post('mobilenumber');
	// 		$insertArray['address'] = $this->input->post('address');
	// 		// $insertArray['image'] = $this->input->post('image');
	// 		$insertArray['created_at'] = date('y-m-d');
	// 		$this->profile_model->insertinto($insertArray);
	// 		$this->session->set_flashdata('success' , 'Record Added Successfully!');
	// 		redirect(base_url().'/admin/profile/insertinto');
	// 	}
		
	// }
	public function upload(){
		$sig_id =  $this->session->userdata('sig_id');

		$insertArray['image'] = array();
		$this->load->model('profile_model');
		if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

			$f_name         =$_FILES['image']['name'];
			$f_tmp          =$_FILES['image']['tmp_name'];
			$f_size         =$_FILES['image']['size'];
			$f_extension    =explode('.',$f_name);
			$f_extension    =strtolower(end($f_extension));
			$f_newfile      =uniqid().'.'.$f_extension;
			$store          ="profile/images".$f_newfile;
			
			if(!move_uploaded_file($f_tmp,$store))
			{
					$this->session->set_flashdata('error', 'file Upload Failed .');
			}
			else
			{
				$insertArray['image'] = $f_newfile;
				$insertArray['id'] = $sig_id;
				$this->profile_model->insertinto($insertArray);
				   
				}

					
			}
			$this->session->set_flashdata('success' , 'Profile Image Successfully!');
			redirect(base_url().'/admin/profile/');
	}

    }



?>