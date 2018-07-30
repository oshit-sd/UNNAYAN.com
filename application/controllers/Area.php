<?php 
/**
* 
*/
class Area extends CI_Controller
{
	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');	
		$this->load->model('Area_model');
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
	}

	/*==========================================*/
	public function index()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}else{
			redirect('dashboard');
		}
	}


	/*====================Add Country=====================*/
	/*====================Add Country=====================*/
	/*====================Add Country=====================*/
	/*====================Add Country=====================*/
	public function addCountry()
	{
		$data['allfatchData'] = $this->Area_model->all_Country_list();
		$data['content'] = 'Area/addCountry';
		$this->load->view('dashboard_layout', $data);
	}


	/*======================================*/
	public function saveCountry()
	{
		$this->form_validation->set_rules('country', 'Country Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchData'] = $this->Area_model->all_Country_list();
			$data['content'] = 'Area/addCountry';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->Area_model->Country_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCountry');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCountry');
			endif;
		}
	}




	/*======================================*/
	public function edit_Country($id = null)
	{
		if ($this->Area_model->edit_Country($id)) {
			$data['editData'] = $this->Area_model->edit_Country($id);
		}
		$this->load->view('Area/editCountry', $data);
	}



	/*=======================================*/	
	public function update_Country_data_check($id = null)
	{
		$this->form_validation->set_rules('country', 'Country Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addCountry');
		}
		else{
			if ($this->Area_model->update_Country($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCountry');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCountry');
			endif;
		}
	}

	/*===================================*/
	public function Country_delete($id = null)
	{
		if($this->Area_model->Country_delete($id))
		{
			$data['failure_alert']="Delete Successfully!";
				$this->session->set_flashdata($data);
			redirect('addCountry');
		}
		else
		{
			$data['failure_alert']="Delete Unsuccessfully!";
				$this->session->set_flashdata($data);
			redirect('addCountry');
		}
	}










	/*================Add City==============*/
	/*================Add City==============*/
	/*================Add City==============*/
	/*================Add City==============*/
	public function addCity()
	{
		$data['allfatchCountry'] 	= $this->Area_model->all_Country_list();
		$data['allfatchCity'] 		= $this->Area_model->all_City_list();
		$data['content'] = 'Area/addCity';
		$this->load->view('dashboard_layout', $data);
	}


	/*===============================*/
	public function saveCity()
	{
		$this->form_validation->set_rules('city', 'City Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchCountry'] 	= $this->Area_model->all_Country_list();
			$data['allfatchCity'] = $this->Area_model->all_City_list();
			$data['content'] = 'Area/addCity';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->Area_model->City_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCity');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCity');
			endif;
		}
	}




	/*===============================*/
	public function edit_City($id = null)
	{
		$data['allfatchCountry'] 	= $this->Area_model->all_Country_list();
		if ($this->Area_model->edit_City($id)) {
			$data['editData'] = $this->Area_model->edit_City($id);
		}
		$this->load->view('Area/editCity', $data);
	}



	/*==============================*/	
	public function update_City_data_check($id = null)
	{
		$this->form_validation->set_rules('city', 'City Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addCity');
		}
		else{
			if ($this->Area_model->update_City($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCity');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCity');
			endif;
		}
	}

	/*===================================*/
	public function City_delete($id = null)
	{
		if($this->Area_model->City_delete($id))
		{
			$data['failure_alert']="Delete Successfully!";
				$this->session->set_flashdata($data);
			redirect('addCity');
		}
		else
		{
			$data['failure_alert']="Delete Unsuccessfully!";
				$this->session->set_flashdata($data);
			redirect('addCity');
		}
	}











	/*================Add Zone==============*/
	/*================Add Zone==============*/
	/*================Add Zone==============*/
	/*================Add Zone==============*/
	public function addArea()
	{
		$data['allfatchCity'] = $this->Area_model->all_City_list();
		$data['allfatchArea'] = $this->Area_model->all_Area_list();
		$data['content'] = 'Area/addArea';
		$this->load->view('dashboard_layout', $data);
	}


	/*===============================*/
	public function saveArea()
	{
		$this->form_validation->set_rules('area', 'City Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchCity'] = $this->Area_model->all_City_list();
			$data['allfatchArea'] = $this->Area_model->all_Area_list();
			$data['content'] = 'Area/addArea';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->Area_model->Area_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addArea');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addArea');
			endif;
		}
	}




	/*===============================*/
	public function edit_Area($id = null)
	{
		if ($this->Area_model->edit_Area($id)) {
			$data['editData'] = $this->Area_model->edit_Area($id);
		}
		$this->load->view('Area/editArea', $data);
	}



	/*==============================*/	
	public function update_Area_data_check($id = null)
	{
		$this->form_validation->set_rules('area', 'City Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addArea');
		}
		else{
			if ($this->Area_model->update_Area($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addArea');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addArea');
			endif;
		}
	}


	/*===================================*/
	public function Area_delete($id = null)
	{
		if($this->Area_model->Area_delete($id))
		{
			$data['failure_alert']="Delete Successfully!";
				$this->session->set_flashdata($data);
			redirect('addArea');
		}
		else
		{
			$data['failure_alert']="Delete Unsuccessfully!";
				$this->session->set_flashdata($data);
			redirect('addArea');
		}
	}



}
