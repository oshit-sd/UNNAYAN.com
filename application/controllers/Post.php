<?php 
/**
* 
*/
class Post extends CI_Controller
{

	/*=================================*/
	public function __construct()
	{
		parent::__construct();

		$vars['fatchCountry'] 	 = $this->Area_model->all_Country_list();
		$vars['fatchCity'] 		 = $this->Area_model->all_City_list();
		$vars['fatchArea']		 = $this->Area_model->all_Area_list();
		$vars['fatchPriceType']  = $this->PriceType_model->all_PriceType_list();

		$uid = $this->session->userdata('user_id');
		$vars['accessCategory']  = $this->User_model->fatch_access_user_data($uid);
		$vars['fatchPhoneCode'] = $this->PhoneCode_model->all_PhoneCode_list();
		
		$vars['fatchAboutus'] = $this->About_model->all_about_footer_text();
		$vars['fatchSubCategory']=$this->Subcategory_model->all_Subcategory_list();
		$vars['fatchCategory'] 	  = $this->Category_model->all_category_list();
		$vars['fatchContactInfo'] = $this->Contact_model->show_contact_us();
		$vars['fatchcontact'] = $this->Contact_model->show_footer_contact_us();
		$this->load->vars($vars);
	}

	/*=====================================*/
	public function index()
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
	}



	/*====================================*/
	public function buyer_seller_Post_page()
	{
		$id = $this->session->userdata('user_id');
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$uid =  $this->session->userdata('user_id'); 
            $date = date('Y-m-d');
            $countP  = $this->db->from("tbl_post")->where('p_date', $date)->where('tbl_post.p_add_by',$uid)->where('p_status', 'p')->count_all_results();

            $countA  = $this->db->from("tbl_post")->where('p_date', $date)->where('tbl_post.p_add_by',$uid)->where('p_status', 'a')->count_all_results();

            $countPost = $countP + $countA;

            if ($countPost == 5) :
            	$data['postCheck']="Sorry!! you can't make more than 5 posts in a day";
				$this->session->set_flashdata($data);
				redirect('User-Dashboard');
         	else:
				$data['accessCategory'] = $this->User_model->fatch_access_user_data($id);
				$data['content'] = 'user_dashboard/post_product';
				$this->load->view('FrontEnd/homeMaster', $data);
          	endif;

		}
	}




	/*===================================*/
	public function fatch_sub_category_with_ajax($cate = null)
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$data = $this->Category_model->fatch_sub_category_with_ajax($cate);
			echo json_encode($data);
		}
	}



	/*===================================*/
	public function fatch_city_with_ajax($country = null)
	{
		// if (!$this->User_model->is_user_loged_in_dashboard()) 
		// {
		// 	$data['check'] = 'Unsuccessfully';
		// 	$this->session->set_flashdata($data);
		// 	redirect('signIn/?logged_in_first');
		// }
		// else{
			$data = $this->Area_model->fatch_city_with_ajax($country);
			echo json_encode($data);
		// }
	}


	/*===================================*/
	public function fatch_zone_with_ajax($city = null)
	{
		// if (!$this->User_model->is_user_loged_in_dashboard()) 
		// {
		// 	$data['check'] = 'Unsuccessfully';
		// 	$this->session->set_flashdata($data);
		// 	redirect('signIn/?logged_in_first');
		// }
		// else{
			$data = $this->Area_model->fatch_zone_with_ajax($city);
			echo json_encode($data);
		// }
	}





	/*===========================================*/
	public function save_Post_Product_data_check()
	{
	$this->form_validation->set_rules('p_title', 'Title', 'required|trim');
	$this->form_validation->set_rules('p_phone', 'Phone', 'required|trim');
	$this->form_validation->set_rules('p_price', 'Price', 'required|trim');
	$this->form_validation->set_rules('p_price_type', 'Price Type', 'required|trim');
	$this->form_validation->set_rules('p_category', 'Category', 'required|trim');


		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'user_dashboard/post_product';
			$this->load->view('FrontEnd/homeMaster', $data);
		}
		else{  
			if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE)
				{		
					//echo "hi"; exit();
					if($this->Post_model->insert_Post_data()){
						$data['message']="Post your product successfully!";
						$this->session->set_flashdata($data);
						redirect('PostProduct');
					}else{
						$data['message2']="Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('PostProduct');
					}
				}
				else{
				$img 	= $this->image_upload();
	            $img2 	= $this->image_upload2();
	            $img3 	= $this->image_upload3();
	            $img4 	= $this->image_upload4();
	            $file 	= $this->DocPdf_upload();
				
				if( isset($img) || isset($img2)){

	            $data=array("image"  => $img, "image2" => $img2, "image3"  => $img3, "image4" => $img4, "DocPdfUpload" => $file);
	            $this->image_upload_resize($img);
	            $this->image_upload2_resize($img2);
	            $this->image_upload3_resize($img3);
	            $this->image_upload4_resize($img4);

					if($this->Post_model->insert_Post_data_with_image($img, $img2, $img3, $img4, $file)){
							$data['message']="Post your product successfully!";
							$this->session->set_flashdata($data);
							redirect('User-Dashboard');
					}else{
						$data['message2']="Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('User-Dashboard');
					}
					
				}else{
					$data['message2']="Image Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('User-Dashboard');
				}
			}
		}
			
	}



	/*======================================*/
	public function image_upload(){
		$type = explode('.', $_FILES['image']['name']);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg','JPG', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $_FILES['image']['tmp_name'] ) ){

				move_uploaded_file( $_FILES['image']['tmp_name'], './libs/upload_pic/PostImg/'.$file_name );
				return $file_name;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	// =================================
	public function image_upload_resize($sourse){
		 $this->load->library('image_lib');

		 /* First size */
		 $configSize1['image_library']   = 'gd2';
		 $configSize1['source_image'] = './libs/upload_pic/PostImg/'.$sourse;
		 $configSize1['create_thumb']    = FALSE;
		 $configSize1['maintain_ratio']  = FALSE;
		 $configSize1['width']           = 650;
		 $config['quality']   			 = '100';
		 $configSize1['height']          = 600;
		 $configSize1['new_image'] = './libs/upload_pic/PostImg/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();	 
	}



	/*==========================================*/
	public function image_upload2(){
		$type = explode('.', $_FILES['image2']['name']);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg','JPG', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $_FILES['image2']['tmp_name'] ) ){

				move_uploaded_file( $_FILES['image2']['tmp_name'], './libs/upload_pic/PostImg/'.$file_name );
				return $file_name;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	// =================================
	public function image_upload2_resize($sourse){
		 $this->load->library('image_lib');

		 /* First size */
		 $configSize1['image_library']   = 'gd2';
		 $configSize1['source_image'] = './libs/upload_pic/PostImg/'.$sourse;
		 $configSize1['create_thumb']    = FALSE;
		 $configSize1['maintain_ratio']  = FALSE;
		 $configSize1['width']           = 650;
		 $config['quality']   			 = '100';
		 $configSize1['height']          = 600;
		 $configSize1['new_image'] = './libs/upload_pic/PostImg/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();	 
	}



	/*======================================*/
	public function image_upload3(){
		$type = explode('.', $_FILES['image3']['name']);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg','JPG', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $_FILES['image3']['tmp_name'] ) ){

				move_uploaded_file( $_FILES['image3']['tmp_name'], './libs/upload_pic/PostImg/'.$file_name );
				return $file_name;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}


	// =================================
	public function image_upload3_resize($sourse){
		 $this->load->library('image_lib');

		 /* First size */
		 $configSize1['image_library']   = 'gd2';
		 $configSize1['source_image'] = './libs/upload_pic/PostImg/'.$sourse;
		 $configSize1['create_thumb']    = FALSE;
		 $configSize1['maintain_ratio']  = FALSE;
		 $configSize1['width']           = 650;
		 $config['quality']   			 = '100';
		 $configSize1['height']          = 600;
		 $configSize1['new_image'] = './libs/upload_pic/PostImg/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();	 
	}



	/*==================================*/
	public function image_upload4(){
		$type = explode('.', $_FILES['image4']['name']);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg','JPG', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $_FILES['image4']['tmp_name'] ) ){

				move_uploaded_file( $_FILES['image4']['tmp_name'], './libs/upload_pic/PostImg/'.$file_name );
				return $file_name;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	// =================================
	public function image_upload4_resize($sourse){
		 $this->load->library('image_lib');

		 /* First size */
		 $configSize1['image_library']   = 'gd2';
		 $configSize1['source_image'] = './libs/upload_pic/PostImg/'.$sourse;
		 $configSize1['create_thumb']    = FALSE;
		 $configSize1['maintain_ratio']  = FALSE;
		 $configSize1['width']           = 650;
		 $config['quality']   			 = '100';
		 $configSize1['height']          = 600;
		 $configSize1['new_image'] = './libs/upload_pic/PostImg/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();	 
	}



	/*==================================*/
	public function DocPdf_upload(){
		$type = explode('.', $_FILES['DocPdfUpload']['name']);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg','JPG', 'png', 'jpeg', 'gif','doc','docx','pdf', 'DOC','DOCX','PDF', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $_FILES['DocPdfUpload']['tmp_name'] ) ){

				move_uploaded_file( $_FILES['DocPdfUpload']['tmp_name'], './libs/upload_pic/PostImg/'.$file_name );
				return $file_name;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}




	/*========================================*/
	public function fatch_pending_post()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$data['fatchPostProduct'] = $this->Post_model->fatch_all_user_post();
			$data['content'] = 'post_product/pending_post_page';
			$this->load->view('dashboard_layout', $data);
		}
	}


	/*========================================*/
	public function approve_post_product($id)
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$this->Post_model->approve_post_product($id);
			redirect('PendingPost');
		}
	}



	/*========================================*/
	public function fatch_approve_post()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$data['fatchPostProduct'] = $this->Post_model->fatch_all_user_post();
			$data['content'] = 'post_product/approve_post_page';
			$this->load->view('dashboard_layout', $data);
		}
	}



	/*=====================================*/
	public function view_Single_Post($id = null)
	{
		if ($this->Post_model->fatch_Single_Post($id)) {
			$data['postData'] = $this->Post_model->fatch_Single_Post($id);
		}
		$this->load->view('post_product/single_post_product_page',$data);
	}



	/*=====================================*/
	public function edit_user_Product($id = null)
	{
		$uid = $this->session->userdata('user_id');
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			if ($this->Post_model->edit_user_Product($id)) {
				$data['editData'] = $this->Post_model->edit_user_Product($id);
			}
			$data['accessCategory'] = $this->User_model->fatch_access_user_data($uid);
			$this->load->view('FrontEnd/user_dashboard/edit_post_product',$data);
		}
	}




	/*====================================================================*/
	public function update_post_product($id = null)
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			redirect('signIn/?logged_in_first');
		}
		else{
			if((!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) && (!isset($_FILES['image2']) || $_FILES['image2']['error'] == UPLOAD_ERR_NO_FILE) && (!isset($_FILES['image3']) || $_FILES['image3']['error'] == UPLOAD_ERR_NO_FILE) && (!isset($_FILES['image4']) || $_FILES['image4']['error'] == UPLOAD_ERR_NO_FILE))
				{
					if($this->Post_model->update_post_product($id)) :
						$data['message']="Update Successfully!";
						$this->session->set_flashdata($data);
						redirect('User-Dashboard');
					else :
						$data['message2']="Update Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('User-Dashboard');
					endif;	
			}else{
				//$old = $this->input->post('old_img');

				$img 	= $this->image_upload();
	            $img2 	= $this->image_upload2();
	            $img3 	= $this->image_upload3();
	            $img4 	= $this->image_upload4();
	       
	            if( isset($img) || isset($img2)){

	            $data=array("image"  => $img, "image2" => $img2, "image3"  => $img3, "image4" => $img4);

	            $this->image_upload_resize($img);
	            $this->image_upload2_resize($img);
	            $this->image_upload3_resize($img);
	            $this->image_upload4_resize($img);
	            
					if($this->Post_model->update_post_product_with_image($img, $img2, $img3, $img4, $id)) :

						//unlink('libs/upload_pic/productImg/'.$old);

						$data['message']="Update Successfully!";
						$this->session->set_flashdata($data);
						redirect('User-Dashboard');
					else :
						$data['message2']="Update Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('User-Dashboard');
					endif;	
				}else{
					$data['message2']="Image Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('User-Dashboard');
				}
			}
		}
	}




	/*===================================*/
	public function Post_delete()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$id = $this->input->post('id');
			if($this->Post_model->Post_delete($id)):
				echo json_encode(TRUE);
			else:
				echo json_decode(TRUE);
			endif;
		}
	}



	/*===================================*/
	public function user_Post_delete()
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$id = $this->input->post('id');
			if($this->Post_model->Post_delete($id)):
				echo json_encode(TRUE);
			else:
				echo json_decode(TRUE);
			endif;
		}
	}


































	/*========================================*/
	public function edit_Post($id = null)
	{
		$data['allBrand'] = $this->Brand_model->all_Brand_list();
		$data['allCategoryData'] = $this->Category_model->all_category_list();

		if ($this->Post_model->edit_Post($id)) {
			$data['editData'] = $this->Post_model->edit_Post($id);
		}
		$data['content'] = 'Post/editPost';
		$this->load->view('dashboard_layout', $data);
	}
	




	/*====================================================================*/
	public function update_Post_data_check($id = null)
	{
		$this->form_validation->set_rules('pid', 'Post ID', 'required|trim|');
		if($this->form_validation->run() == FALSE)
			{
				$data['content'] = 'Post/editPost';
				$this->load->model('Category_model');
				$data['allBrand'] = $this->Brand_model->all_Brand_list();
				$data['allCategoryData'] = $this->Category_model->all_category_list();
				$this->load->view('dashboard_layout', $data);
			}
			else{

			if((!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) && (!isset($_FILES['image2']) || $_FILES['image2']['error'] == UPLOAD_ERR_NO_FILE) && (!isset($_FILES['image3']) || $_FILES['image3']['error'] == UPLOAD_ERR_NO_FILE) && (!isset($_FILES['image4']) || $_FILES['image4']['error'] == UPLOAD_ERR_NO_FILE))
				{
					if($this->Post_model->update_Post( $id)) :
						$data['message']="Data Update Successfully!";
						$this->session->set_flashdata($data);
						redirect('PostProduct');
					else :
						$data['message2']="Data Update Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('PostProduct');
					endif;	

			}else{
				//$old = $this->input->post('old_img');

				$img 	= $this->image_upload();
	            $img2 	= $this->image_upload2();
	            $img3 	= $this->image_upload3();
	            $img4 	= $this->image_upload4();
	       
	            if( isset($img) || isset($img2)){

	            $data=array("image"  => $img, "image2" => $img2, "image3"  => $img3, "image4" => $img4);
					if($this->Post_model->update_Post_with_image($img, $img2, $img3, $img4, $id)) :

						//unlink('libs/upload_pic/PostImg/'.$old);

						$data['message']="Data Update Successfully!";
						$this->session->set_flashdata($data);
						redirect('PostProduct');
					else :
						$data['message2']="Data Update Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('PostProduct');
					endif;	
				}else{
					$data['message2']="Image Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('PostProduct');
				}
			}
		}
	}


}
