<?php 
/**
* 
*/
class Admin extends CI_Controller
{
	/*===================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
	}


	/*===================================*/
	public function index()
	{$this->load->model('Admin_model');
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			redirect('dashboard');
		}
	}


	/*===================================*/
	public function add_admin()
	{
		$data['allfatchData'] = $this->Admin_model->all_admin_list();
		$data['content'] = 'dashboard/add_admin';
		$this->load->view('dashboard_layout', $data);
	}


	/*===================================*/
	public function add_admin_data_check()
	{
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|min_length[11]');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('user_name', 'Admin Name', 'required|trim|min_length[3]|is_unique[create_admin.user_name]');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');
		$this->form_validation->set_rules('con_password', 'Confirm Password', 'required|trim|min_length[6]|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchData'] = $this->Admin_model->all_admin_list();
			$data['content'] = 'dashboard/add_admin';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->Admin_model->add_admin_data_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('add_admin');
			else :
				$data['message2']="Save Unuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_admin');
			endif;
		}
	}



	/*===================================*/
	public function admin_delete($id = null)
	{
		if($this->Admin_model->admin_delete($id))
		{
			$data['failure_alert']="Delete Successfully!";
				$this->session->set_flashdata($data);
			redirect('add_admin');
		}
		else
		{
			$data['failure_alert']="Delete Unsuccessfully!";
				$this->session->set_flashdata($data);
			redirect('add_admin');
		}
	}


	/*===================================*/
	public function edit_admin($id = null)
	{
		if ($this->Admin_model->edit_admin($id)) {
			$data['editData'] = $this->Admin_model->edit_admin($id);
		}
		$data['content'] = 'dashboard/edit_admin';
		$this->load->view('dashboard_layout', $data);
	}


	/*===================================*/
	public function edit_admin_data_check($id = null)
	{
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|min_length[11]');
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('user_name', 'Admin Name', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');
		$this->form_validation->set_rules('con_password', 'Confirm Password', 'trim|min_length[6]|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Somethig Went wrong!";
				$this->session->set_flashdata($data);
			redirect('add_admin');
		}
		else{
			if ($this->Admin_model->edit_admin_data_update($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('add_admin');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_admin');
			endif;
		}
	}




	/*===================================*/
	public function access_admin($id = null)
	{
		$data['AccessData'] = $this->Admin_model->access_admin($id);
		$this->load->view('dashboard/access_admin', $data);
	}
	


	/*===================================*/
	public function define_access($id = null)
	{
		if ($this->Admin_model->define_access($id)) :
			$data['message']="Access Successfully!";
			$this->session->set_flashdata($data);
			redirect('add_admin');
		else :
			$data['message2']="Access Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('add_admin');
		endif;
	}



}
