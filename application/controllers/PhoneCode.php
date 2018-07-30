<?php 
/**
* 
*/
class PhoneCode extends CI_Controller
{


	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');	
		$this->load->model('PhoneCode_model');
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
	}


	/*================================================*/
	public function index()
	{
		redirect('dashboard');
	}


	/*===========================================*/
	public function addPhoneCode()
	{
		$data['allfatchData'] = $this->PhoneCode_model->all_PhoneCode_list();
		$data['content'] = 'PhoneCode/addPhoneCode';
		$this->load->view('dashboard_layout', $data);
	}


	/*=====================================*/
	public function savePhoneCode()
	{
		$this->form_validation->set_rules('phone_code', 'Phone Code', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchData'] = $this->PhoneCode_model->all_PhoneCode_list();
			$data['content'] = 'PhoneCode/addPhoneCode';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->PhoneCode_model->PhoneCode_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addPhoneCode');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addPhoneCode');
			endif;
		}
	}




	/*===================================*/
	public function edit_PhoneCode($id = null)
	{
		if ($this->PhoneCode_model->edit_PhoneCode($id)) {
			$data['editData'] = $this->PhoneCode_model->edit_PhoneCode($id);
		}
		$this->load->view('PhoneCode/editPhoneCode', $data);
	}



	/*======================================*/	
	public function update_PhoneCode_data_check($id = null)
	{
		$this->form_validation->set_rules('phone_code', 'Phone Code', 'required|trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addPhoneCode');
		}
		else{
			if ($this->PhoneCode_model->update_PhoneCode($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addPhoneCode');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addPhoneCode');
			endif;
		}
	}




}
