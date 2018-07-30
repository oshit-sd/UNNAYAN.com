<?php 
/**
* 
*/
class Terms extends CI_Controller
{

	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Terms_model');
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
	public function add_Terms()
	{	
		$data['fatchAllData'] = $this->Terms_model->all_Terms_text();
		$data['content'] = 'Terms/addTerms';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function save_Terms()
	{
		$this->form_validation->set_rules('details', 'Terms Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Terms/addTerms';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Terms_model->insert_Terms()){
					$data['message']="Data Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Terms');
			}else{
				$data['message2']="Data Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Terms');
			}
		}
	}



	/*====================================================================*/
	public function update_Terms_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'Terms Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Terms/addTerms';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Terms_model->edit_Terms_data_update($id)) :
					$data['message']="Data Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Terms');
			else:
				$data['message2']="Data Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Terms');
			endif;	
		}
	}
}
