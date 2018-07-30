<?php 
/**
* 
*/
class Corporate extends CI_Controller
{
	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Corporate_model'); 
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
	public function addCorporate()
	{
		$data['fatchClient'] = $this->Corporate_model->all_Corporate_list();
		$data['content'] = 'Corporate/addCorporate';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function Corporate_data_check()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Corporate/addCorporate';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($file_name = $this->image_upload() ){
				$data=array("image" => $file_name);
				$this->logo_resize($file_name);

				if($this->Corporate_model->insert_Corporate($file_name)){
						$data['message']="Successfully!";
						$this->session->set_flashdata($data);
						redirect('addCorporate');
				}else{
					$data['message2']="Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('addCorporate');
				}
				
			}else{
				$data['message3']="Image Upload Failed!";
				$this->session->set_flashdata($data);
				redirect('addCorporate');
			}
		}
	}


	/*====================================================================*/
	public function image_upload(){
		if($this->Admin_model->is_user_loged_in() ){
			$type = explode('.', $_FILES['image']['name']);
			$type = $type[count($type)-1];
			$file_name= uniqid(rand()).'.'.$type;

			if( in_array($type, array('jpg', 'JPG', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

					if( is_uploaded_file( $_FILES['image']['tmp_name'] ) ){

					move_uploaded_file( $_FILES['image']['tmp_name'], './libs/upload_pic/Corporate_logo/'.$file_name );
					return $file_name;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}




	// =================================
	public function logo_resize($sourse){
		 $this->load->library('image_lib');

		 /* First size */
		 $configSize1['image_library']   = 'gd2';
		 $configSize1['source_image'] = './libs/upload_pic/Corporate_logo/'.$sourse;
		 $configSize1['create_thumb']    = FALSE;
		 $configSize1['maintain_ratio']  = FALSE;
		 $configSize1['width']           = 200;
		 $config['quality']   			 = '100';
		 $configSize1['height']          = 200;
		 $configSize1['new_image'] = './libs/upload_pic/Corporate_logo/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();		 
	}





	/*====================================================================*/
	public function edit_Corporate($id = null)
	{
		$this->load->model('Corporate_model');
		if ($this->Corporate_model->edit_Corporate($id)) {
			$data['editData'] = $this->Corporate_model->edit_Corporate($id);
		}
		$data['content'] = 'Corporate/editCorporate';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function update_Corporate_data_check($id = null)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Corporate/addCorporate';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE)
			{	
				if($this->Corporate_model->update_Corporate($id)){
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('addCorporate');
				}else{
					$data['message2']="Update Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('addCorporate');
				}
			}
			else{
				if($file_name = $this->image_upload() ){
					$data=array("image" => $file_name);

					if($this->Corporate_model->update_Corporate_with_image($file_name, $id)){
							$data['message']="Update Successfully!";
							$this->session->set_flashdata($data);
							redirect('addCorporate');
					}else{
						$data['message2']="Update Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('addCorporate');
					}	
				}else{
					$data['message2']="Image Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('addCorporate');
				}
			}
		}
	}


	/*====================================================================*/
	public function Corporate_delete($id = null,$old)
	{
		$this->load->model('Corporate_model');
		if($this->Corporate_model->Corporate_delete($id))
		{
			unlink('libs/upload_pic/Corporate_logo/'.$old);
			$data['message']="Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('addCorporate');
		}
		else
		{
			$data['message2']="Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('addCorporate');
		}
	}
}
