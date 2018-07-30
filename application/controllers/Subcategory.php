<?php 
/**
* 
*/
class Subcategory extends CI_Controller
{


	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');	
		$this->load->model('Subcategory_model');
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
	public function addSubCategory()
	{
		$data['categoryList'] = $this->Category_model->all_category_list();
		$data['SubCategoryList'] = $this->Subcategory_model->all_Subcategory_list();
		$data['content'] = 'category/addSubCategory';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function saveSubCategory()
	{
		$this->form_validation->set_rules('category', 'Name', 'required|trim');
		$this->form_validation->set_rules('subCategory', 'Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['categoryList'] = $this->Category_model->all_category_list();
			$data['SubCategoryList']= $this->Subcategory_model->all_Subcategory_list();
			$data['content'] = 'category/addSubCategory';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if ($this->Subcategory_model->Subcategory_insert()) :
				$data['message']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('addSubCategory');
			else :
				$data['message2']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addSubCategory');
			endif;
		}
	}




	/*====================================================================*/
	public function edit_SubCategory($id = null)
	{
		if ($this->Subcategory_model->edit_SubCategory($id)) {
			$data['categoryList'] = $this->Category_model->all_category_list();
			$data['editData'] = $this->Subcategory_model->edit_SubCategory($id);
		}
		$this->load->view('category/editSubCategory', $data);
	}



	/*====================================================================*/	
	public function update_SubCategory_data_check($id = null)
	{
		$this->form_validation->set_rules('category', 'Name', 'required|trim');
		$this->form_validation->set_rules('subCategory', 'Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['message2']="Update Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addSubCategory');
		}
		else{
			if ($this->Subcategory_model->update_Subcategory($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('addSubCategory');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('addSubCategory');
			endif;
		}
	}


}
