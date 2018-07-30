<?php 
/**
* 
*/
class Service extends CI_Controller
{

	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Service_model');
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
	}


	/*====================================================================*/
	public function index()
	{
		redirect('dashboard');
	}


	/*====================================================================*/
	public function add_Service()
	{	
		$data['fatchAllData'] = $this->Service_model->all_Service_text();
		$data['content'] = 'Service/addService';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function save_Service()
	{
		$this->form_validation->set_rules('details', 'Service Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Service/addService';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Service_model->insert_Service()){
					$data['message']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Service');
			}else{
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Service');
			}
		}
	}



	/*====================================================================*/
	public function update_Service_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'Service Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Service/addService';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Service_model->edit_Service_data_update($id)) :
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Service');
			else:
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Service');
			endif;	
		}
	}
}
