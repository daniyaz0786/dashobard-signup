<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_controller{

	 public function index()
	{
	 
	  $this->load->model('user_model');
	  $users = $this->user_model->all();
	  $data = array();
	  $data['stform'] = $users;
	  $this->load->view('list',$data);

	}
	 
	public function create()
	{
		
		$this->load->model('user_model');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		// $this->form_validation->set_rules('image', 'Image', 'required');
		
		if(	$this->form_validation->run() == False)
		{
			$this->load->view('create');
		}else{
			$insertArray = array();

			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

				$f_name         =$_FILES['image']['name'];
				$f_tmp          =$_FILES['image']['tmp_name'];
				$f_size         =$_FILES['image']['size'];
				$f_extension    =explode('.',$f_name);
				$f_extension    =strtolower(end($f_extension));
				$f_newfile      =uniqid().'.'.$f_extension;
				$store          ="uploads/images/".$f_newfile;
				
				if(!move_uploaded_file($f_tmp,$store))
				{
						$this->session->set_flashdata('error', 'file Upload Failed .');
				}
				else
				{
					$insertArray['image'] = $f_newfile;
					   
					}
				}
	

			$insertArray['name'] = $this->input->post('name');
			$insertArray['email'] = $this->input->post('email');
			$insertArray['phone'] = $this->input->post('phone');
			$insertArray['address'] = $this->input->post('address');
			// $insertArray['image'] = $this->input->post('image');
			$insertArray['created_at'] = date('y-m-d');
			$this->user_model->create($insertArray);
			$this->session->set_flashdata('success' , 'Record Added Successfully!');
			redirect(base_url().'admin/user/index');
		}
		
	}
	public function delete ($userId){
		// print_r ($userId);
		// die;
		$users = $this->load->model('user_model');
		if(empty($users)){
			$this->session->set_flashdata('error' , 'Deleted Failed');
			redirect(base_url().'User/index');
		
		}else{
			$this->user_model->deleteusers($userId);
			$this->session->set_flashdata('error' , 'Record Deleted SuccessFully');
			redirect(base_url().'admin/User/index');

		}

	}
	
	public function edit ($userId) {
		 //print_r ($userId);
	    //  die;
		$this->load->model('user_model');
		$user = $this->user_model->getUser($userId);
		$data = array();                                                                                                                             
	    $data['stform'] = $this->user_model->getUser($userId);
		// print_r( $data['stform'] );
		$this->load->view('edit',$data);
	}
	public function update () 
	{
	
	   $this->load->model('user_model');
	   $this->form_validation->set_rules('name', 'Name', 'required');
	   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	   $this->form_validation->set_rules('phone', 'Phone', 'required');
	   $this->form_validation->set_rules('address', 'Address', 'required');
	   if(	$this->form_validation->run() == False)
	   {
		redirect(base_url().'admin/user/edit');
	   }else{
		$userId = $this->input->post('st_id');

		
		   $formArray = array();
		   $formArray['name'] = $this->input->post('name');
		   $formArray['email'] = $this->input->post('email');
		   $formArray['phone'] = $this->input->post('phone');
		   $formArray['address'] = $this->input->post('address');
		   $formArray['created_at'] = date('y-m-d');

		   if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

			$f_name         =$_FILES['image']['name'];
			$f_tmp          =$_FILES['image']['tmp_name'];
			$f_size         =$_FILES['image']['size'];
			$f_extension    =explode('.',$f_name);
			$f_extension    =strtolower(end($f_extension));
			$f_newfile      =uniqid().'.'.$f_extension;
			$store          ="uploads/images/".$f_newfile;
		
			if(!move_uploaded_file($f_tmp,$store))
			{
				$this->session->set_flashdata('error', 'Image Upload Failed .');
			}
			else
			{
			   $formArray['image'] = $f_newfile;
			   
			}
		 }else{


			$formArray['image'] =   $form_data['old_image'];

		 }

		   $this->edit($this->input->post('st_id'));
		  $result =  $this->user_model->updateusers( $userId,$formArray);
		   
		   if($result)
		   {
			$this->session->set_flashdata('success' , 'Record Updated Successfully!');
		   }
		   
		   redirect(base_url().'admin/user/index');
	   }


   }
}
?>



<!-- }else{
			$this->user_model->deleteusers($userId);
			$this->session->set_flashdata('error' , 'Record Deleted SuccessFully');
			redirect(base_url().'User/index');

		} -->