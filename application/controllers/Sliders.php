<?php 
/**
* 
*/
class Sliders extends CI_Controller
{
	/*====================================================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');	
		$this->load->model('Slider_model');
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

	public function add_slider()
	{
		$data['allfatchData'] = $this->Slider_model->all_slider_list();
		$data['content'] = 'slider/addSlider';
		$this->load->view('dashboard_layout', $data);
	}


	/*====================================================================*/
	public function add_slider_data_check()
	{
		$tmpName = $_FILES['image']['tmp_name'];
        
		list($width, $height) = getimagesize($tmpName);

		if($width==890 && $height==280){
			if($file_name = $this->image_upload() ){
				$data=array("image" => $file_name);

				if($this->Slider_model->image_insert($file_name)){
						$data['message']="Image Upload Successfully!";
						$this->session->set_flashdata($data);
						redirect('add_slideImage');
				}else{
					$data['message2']="Image Upload Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('add_slideImage');
				}
				
			}else{
				$data['message3']="Image Upload Failed!";
				$this->session->set_flashdata($data);
				redirect('add_slideImage');
			}
	}
	else
		{
		$data['message2']="Image size must be (280 X 890 px)";
			$this->session->set_flashdata($data);
			redirect('add_slideImage');
		}
	}


	/*====================================================================*/
	public function image_upload(){
		if($this->Admin_model->is_user_loged_in() ){
			$type = explode('.', $_FILES['image']['name']);
			$type = $type[count($type)-1];
			$file_name= uniqid(rand()).'.'.$type;

			if( in_array($type, array('jpg', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

					if( is_uploaded_file( $_FILES['image']['tmp_name'] ) ){

					move_uploaded_file( $_FILES['image']['tmp_name'], './libs/upload_pic/slider_image/'.$file_name );
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


	/*====================================================================*/
	public function slider_delete($id = null,$old)
	{
		$this->load->model('Slider_model');
		if($this->Slider_model->slider_delete($id))
		{
			unlink('libs/upload_pic/slider_image/'.$old);
			$data['message2']="Image Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('add_slideImage');
		}
		else
		{
			$data['message2']="Image Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('add_slideImage');
		}
	}
}
