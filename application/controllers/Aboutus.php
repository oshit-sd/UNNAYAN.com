<?php 
/**
* 
*/
class Aboutus extends CI_Controller
{

	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('About_model');
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
	}


	/*============Index page=============*/
	public function index()
	{
		redirect('dashboard');
	}


	/*====================================================================*/
	public function add_aboutus()
	{	
		$data['fatchAllData'] = $this->About_model->all_about_text();
		$data['content'] = 'about/addAbout';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function save_about()
	{
		$this->form_validation->set_rules('details', 'About Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'about/addAbout';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->About_model->insert_about()){
					$data['message']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_about');
			}else{
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_about');
			}
		}
	}



	/*====================================================================*/
	public function update_about_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'About Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'about/addAbout';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->About_model->edit_about_data_update($id)) :
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('add_about');
			else:
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('add_about');
			endif;	
		}
	}











	/*=====================Footer About Us==================*/
	/*=====================Footer About Us==================*/
	/*=====================Footer About Us==================*/
	/*=====================Footer About Us==================*/
	public function add_footer_aboutUs()
	{	
		$data['fatchAllData'] = $this->About_model->all_about_footer_text();
		$data['content'] = 'about/addAboutFooter';
		$this->load->view('dashboard_layout', $data);
	}


	/*=====================================*/
	public function save_footer_aboutUs()
	{
		$this->form_validation->set_rules('details', 'About Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'about/addAboutFooter';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->About_model->insert_footer_about()){
					$data['message']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('footer_aboutUs');
			}else{
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('footer_aboutUs');
			}
		}
	}



	/*============================================*/
	public function update_footer_aboutUs($id = null)
	{
		$this->form_validation->set_rules('details', 'About Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'about/addAboutFooter';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($this->About_model->edit_about_footer_data_update($id)) :
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('footer_aboutUs');
			else:
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('footer_aboutUs');
			endif;	
		}
	}




}
