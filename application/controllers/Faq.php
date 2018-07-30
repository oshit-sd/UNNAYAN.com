<?php 
/**
* 
*/
class Faq extends CI_Controller
{

	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Faq_model');
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
	public function add_Faq()
	{	
		$data['fatchAllData'] = $this->Faq_model->all_Faq_text();
		$data['content'] = 'Faq/addFaq';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function save_Faq()
	{
		$this->form_validation->set_rules('details', 'Faq Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Faq/addFaq';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Faq_model->insert_Faq()){
					$data['message']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Faq');
			}else{
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Faq');
			}
		}
	}



	/*====================================================================*/
	public function update_Faq_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'Faq Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Faq/addFaq';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Faq_model->edit_Faq_data_update($id)) :
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Faq');
			else:
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Faq');
			endif;	
		}
	}
}
