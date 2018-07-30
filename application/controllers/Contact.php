<?php 
/**
* 
*/
class Contact extends CI_Controller
{
	/*===================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Contact_model');
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
	}


	/*===================================*/
	public function index()
	{
		redirect('dashboard');
	}


	/*===================================*/
	public function add_contactus()
	{	
		$data['fatchAllData'] = $this->Contact_model->show_contact_us();
		$data['content'] = 'contact/addContact';
		$this->load->view('dashboard_layout', $data);
	}


	/*===================================*/
	public function save_contact()
	{
		$this->form_validation->set_rules('details', 'Contact Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'contact/addContact';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Contact_model->insert_contact_us()){
					$data['message']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_contact');
			}else{
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_contact');
			}
		}
	}


	/*===================================*/
	public function update_contact_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'Contact Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'contact/addContact';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Contact_model->Contact_data_update($id)){
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_contact');
			}else{
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_contact');
			}	
		}
	}










	/*===================================*/
	public function footer_contact()
	{	
		$data['fatchAllData'] = $this->Contact_model->show_footer_contact_us();
		$data['content'] = 'contact/addContact_footer';
		$this->load->view('dashboard_layout', $data);
	}


	/*===================================*/
	public function save_footer_contact()
	{
		$this->form_validation->set_rules('details', 'Contact Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'contact/addContact_footer';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Contact_model->insert_footer_contact_us()){
					$data['message']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('footer_contact');
			}else{
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('footer_contact');
			}
		}
	}


	/*===================================*/
	public function update_footer_contact_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'Contact Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'contact/addContact_footer';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->Contact_model->Contact_footer_data_update($id)){
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('footer_contact');
			}else{
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('footer_contact');
			}	
		}
	}

}
