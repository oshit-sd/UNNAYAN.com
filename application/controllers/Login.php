<?php

/**
* 
*/
class Login extends CI_Controller
{

	/*====================================================================*/	
	public function index()
	{
		$this->load->model('Admin_model');
		if ($this->Admin_model->is_user_loged_in()) 
		{
			redirect('dashboard');
		}
		else{
			redirect('/');
		}
	}


	/*====================================================================*/
	public function loginPage()
	{
		$this->load->view('login_page');
	}


	/*====================================================================*/
	public function user_login_data_check()
	{
		$this->load->helper('security');
		$this->form_validation->set_rules('username', 'User Name', 'trim|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_page');
		}
		else{
			$this->load->model('Admin_model');

			$res =  $this->Admin_model->admin_login_data_check();
			if($res)
			{
				redirect('dashboard');
			}
			else{
				$data['error_login'] = 'Invalid User Name or Password';
				$this->load->view('login_page', $data);
			}
		}
	}


	/*====================================================================*/
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->sess_destroy();
		redirect ('login/?logout=Success'); 
	}
}