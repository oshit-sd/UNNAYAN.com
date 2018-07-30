<?php 
/**
* 
*/
class Category extends CI_Controller
{


	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');	
		$this->load->model('Category_model');
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
	}


	/*================================================*/
	public function index()
	{
		redirect('dashboard');
	}


	/*===========================================*/
	public function addCategory()
	{
		$data['allfatchData'] = $this->Category_model->all_category_list();
		$data['content'] = 'category/addCategory';
		$this->load->view('dashboard_layout', $data);
	}


	/*=====================================*/
	public function saveCategory()
	{
		$this->form_validation->set_rules('cate', 'Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchData'] = $this->Category_model->all_category_list();
			$data['content'] = 'category/addCategory';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->Category_model->category_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCategory');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCategory');
			endif;
		}
	}




	/*===================================*/
	public function edit_Category($id = null)
	{
		if ($this->Category_model->edit_Category($id)) {
			$data['editData'] = $this->Category_model->edit_Category($id);
		}
		$data['content'] = 'category/editCategory';
		$this->load->view('dashboard_layout', $data);
	}



	/*======================================*/	
	public function update_Category_data_check($id = null)
	{
		$this->form_validation->set_rules('cate', 'Category Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addCategory');
		}
		else{
			if ($this->Category_model->update_category($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCategory');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCategory');
			endif;
		}
	}








	/*==================Write Details Category====================*/
	/*==================Write Details Category====================*/
	/*==================Write Details Category====================*/
	public function addCategoryDetails()
	{
		$data['fatchData'] = $this->Category_model->all_category_Details();
		$data['content'] = 'category/addCategoryDetails';
		$this->load->view('dashboard_layout', $data);
	}


	/*======================================*/
	public function saveCategoryDetails()
	{
		$this->form_validation->set_rules('details', 'Details', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['allfatchData'] = $this->Category_model->all_category_Details();
			$data['content'] = 'category/addCategoryDetails';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->Category_model->categoryDetails_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCategoryDetails');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCategoryDetails');
			endif;
		}
	}



	/*========================================*/	
	public function update_CategoryDetails($id = null)
	{
		$this->form_validation->set_rules('details', 'Details', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addCategoryDetails');
		}
		else{
			if ($this->Category_model->update_category_Details($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addCategoryDetails');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addCategoryDetails');
			endif;
		}
	}


}
