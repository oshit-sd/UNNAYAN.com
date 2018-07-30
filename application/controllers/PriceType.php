<?php 
/**
* 
*/
class PriceType extends CI_Controller
{


	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');	
		$this->load->model('PriceType_model');
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
	public function addPriceType()
	{
		$data['allfatchData'] = $this->PriceType_model->all_PriceType_list();
		$data['content'] = 'PriceType/addPriceType';
		$this->load->view('dashboard_layout', $data);
	}


	/*=====================================*/
	public function savePriceType()
	{
		$this->form_validation->set_rules('price_type', 'Price Type', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchData'] = $this->PriceType_model->all_PriceType_list();
			$data['content'] = 'PriceType/addPriceType';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->PriceType_model->PriceType_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addPriceType');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addPriceType');
			endif;
		}
	}




	/*===================================*/
	public function edit_PriceType($id = null)
	{
		if ($this->PriceType_model->edit_PriceType($id)) {
			$data['editData'] = $this->PriceType_model->edit_PriceType($id);
		}
		$this->load->view('PriceType/editPriceType', $data);
	}



	/*======================================*/	
	public function update_PriceType_data_check($id = null)
	{
		$this->form_validation->set_rules('price_type', 'Price Type', 'required|trim');
		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addPriceType');
		}
		else{
			if ($this->PriceType_model->update_PriceType($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addPriceType');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addPriceType');
			endif;
		}
	}




}
