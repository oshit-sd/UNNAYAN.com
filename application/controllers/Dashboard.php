<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$this->load->model('Admin_model');
		if ($this->Admin_model->is_user_loged_in()) 
		{
			$data['content'] = 'dashboard/home';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			redirect('login/?logged_in_first');
		}
	}
	
}