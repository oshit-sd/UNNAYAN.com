<?php 
/**
* 
*/
class Gallery extends CI_Controller
{
	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model'); 
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
	public function add_gallery()
	{
		$data['allfatchData'] = $this->Gallery_model->all_gallery_list();
		$data['content'] = 'gallery/addGallery';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function add_gallery_data_check()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'gallery/addGallery';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($file_name = $this->image_upload() ){
				$data=array("image" => $file_name);
				$this->product_image_resize($file_name);

				if($this->Gallery_model->add_gallery($file_name)){
						$data['message']="Gallery Image Save Successfully!";
						$this->session->set_flashdata($data);
						redirect('add_gallery');
				}else{
					$data['message2']="Gallery Image Save Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('add_gallery');
				}
				
			}else{
				$data['message3']="Image Upload Failed!";
				$this->session->set_flashdata($data);
				redirect('add_gallery');
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

					move_uploaded_file( $_FILES['image']['tmp_name'], './libs/upload_pic/gallery_pic/'.$file_name );
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
	public function product_image_resize($sourse){
		 $this->load->library('image_lib');

		 /* First size */
		 $configSize1['image_library']   = 'gd2';
		 $configSize1['source_image'] = './libs/upload_pic/gallery_pic/'.$sourse;
		 $configSize1['create_thumb']    = FALSE;
		 $configSize1['maintain_ratio']  = FALSE;
		 $configSize1['width']           = 700;
		 $config['quality']   			 = '100';
		 $configSize1['height']          = 450;
		 $configSize1['new_image'] = './libs/upload_pic/gallery_pic/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();		 
	}





	/*====================================================================*/
	public function edit_gallery($id = null)
	{
		$this->load->model('Gallery_model');
		if ($this->Gallery_model->edit_gallery($id)) {
			$data['userInfo'] = $this->Gallery_model->edit_gallery($id);
		}
		$data['content'] = 'gallery/editGallery';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function update_gallery_data_check($id = null)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'gallery/addGallery';
			$this->load->view('dashboard_layout', $data);
		}
		else{
			if($file_name = $this->image_upload() ){
				$data=array("image" => $file_name);

				if($this->Gallery_model->update_gallery($file_name, $id)){
						$data['message']="Gallery Image Update Successfully!";
						$this->session->set_flashdata($data);
						redirect('add_gallery');
				}else{
					$data['message2']="Gallery Image Update Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('add_gallery');
				}	
			}else{
				$data['message2']="Image Upload Failed!";
				$this->session->set_flashdata($data);
				redirect('add_gallery');
			}
		}
	}


	/*====================================================================*/
	public function gallery_delete($id = null,$old)
	{
		$this->load->model('Gallery_model');
		if($this->Gallery_model->Gallery_delete($id))
		{
			unlink('libs/upload_pic/gallery_pic/'.$old);
			$data['message2']="Gallery Image Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('add_gallery');
		}
		else
		{
			$data['message2']="Gallery Image Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('add_gallery');
		}
	}
}
