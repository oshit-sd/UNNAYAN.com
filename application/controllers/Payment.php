<?php 
/**
* 
*/
class Payment extends CI_Controller
{

	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Payment_model');
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
	public function add_Payment()
	{	
		$data['fatchAllData'] = $this->Payment_model->all_Payment_text();
		$data['content'] = 'Payment/addPayment';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function save_Payment()
	{
		$this->form_validation->set_rules('details', 'Payment Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Payment/addPayment';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Payment_model->insert_Payment()){
					$data['message']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Payment');
			}else{
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Payment');
			}
		}
	}



	/*====================================================================*/
	public function update_Payment_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'Payment Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Payment/addPayment';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Payment_model->edit_Payment_data_update($id)) :
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_Payment');
			else:
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_Payment');
			endif;	
		}
	}
}
