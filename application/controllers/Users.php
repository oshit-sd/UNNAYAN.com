<?php 
/**
* 
*/
class Users extends CI_Controller
{
	/*====================================*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Post_model');
		$this->load->model('Admin_model');

		$vars['fatchCountry'] 	  = $this->Area_model->all_Country_list();
		$vars['fatchCity'] 		  = $this->Area_model->all_City_list();
		$vars['fatchArea']		  = $this->Area_model->all_Area_list();

		$uid = $this->session->userdata('user_id');
		$vars['accessCategory'] =$this->User_model->fatch_access_user_data($uid);

		$vars['fatchAboutus'] = $this->About_model->all_about_footer_text();
		$vars['fatchSubCategory']=$this->Subcategory_model->all_Subcategory_list();
		$vars['fatchPhoneCode'] = $this->PhoneCode_model->all_PhoneCode_list();
		
		$vars['fatchCategory'] 	  = $this->Category_model->all_category_list();
		$vars['fatchLoggedUser']  = $this->Post_model->fatch_logged_user_info();
		$vars['fatchUserPost']    = $this->Post_model->fatch_all_user_post();
		$vars['fatchUser'] 		  = $this->User_model->fatch_user();
		$vars['fatchContactInfo'] = $this->Contact_model->show_contact_us();
		$vars['fatchcontact'] = $this->Contact_model->show_footer_contact_us();
		$this->load->vars($vars);
	}


	/*====================================*/
	public function index()
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			$data['content'] = 'user_dashboard';
			$this->load->view('FrontEnd/user_dashboard/UserMaster',$data);
		}
	}


	/*=======================================*/
	public function signUp_page()
	{
		$data['content'] = 'signUp';
		$this->load->view('FrontEnd/homeMaster', $data);
	}



	/*=======================================*/
	public function register_or_payment_Please()
	{
		$uid = $this->session->userdata('user_id');
		if(isset($uid)):
			$data['postCheck']="Please make payment for this category !";
			$this->session->set_flashdata($data);
			$data['content'] = 'Payment';
			$this->load->view('FrontEnd/homeMaster', $data);

		else:
			$data['postCheck']="Please register !";
			$this->session->set_flashdata($data);
			$data['content'] = 'signUp';
			$this->load->view('FrontEnd/homeMaster', $data);

		endif;
	}


	/*=======================================*/
	public function register_user_data_check()
	{
		//exit();
		// $file_name = $this->file_upload();
		// $file_name = 0;
		// // if(isset($file_name)){
		// // 			$data=array("RegFile" => $file_name);
		// 	if ($this->User_model->register_user_data_insert($file_name)) :
		// 		echo json_encode(array('ststus' => TRUE));
		// 	else :
		// 		echo json_decode(array('ststus' => TRUE));
		// 	endif;
		// // }else {
		// // 	echo json_decode(array('ststus' => TRUE));
		// // }


		$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'trim');
		$this->form_validation->set_rules('f_name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('Ccode', 'Country Code', 'required|trim');
		$this->form_validation->set_rules('NIDpassNumber', 'NID / PASSPORT', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Payment';
			$this->load->view('FrontEnd/homeMaster', $data);
		}
		else{
			if(!isset($_FILES['RegFile']) || $_FILES['RegFile']['error'] == UPLOAD_ERR_NO_FILE)
			{
				$file_name = 0;
				if ($this->User_model->register_user_data_insert($file_name)) :
					$data['regComplete']="To complete registration, please make payment for your membership";
					$this->session->set_flashdata($data);
					redirect('Payment');
				else :
					$data['message2']="Something went wrong!";
					$this->session->set_flashdata($data);
					redirect('signUp');
				endif;
			}
			else{
				if($file_name = $this->file_upload() ){
					$data=array("RegFile" => $file_name);
					if ($this->User_model->register_user_data_insert($file_name)) :
						$data['regComplete']="To complete registration, please make payment for your membership";
						$this->session->set_flashdata($data);
						redirect('Payment');
					else :
						$data['message2']="Something went wrong!";
						$this->session->set_flashdata($data);
						redirect('signUp');
					endif;
				}else{
					$data['message2']="File Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('signUp');
				}
			}
		}
	}



	/*===============================*/
	public function file_upload(){
		$type = explode('.', $_FILES['RegFile']['name']);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;
		if( in_array($type, array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'PDF', 'DOC', 'DOCX', 'JPG', 'PNG', 'JPEG')) ){

				if( is_uploaded_file( $_FILES['RegFile']['tmp_name'] ) ){

				move_uploaded_file( $_FILES['RegFile']['tmp_name'], './libs/upload_pic/user_reg_file/'.$file_name );
				return $file_name;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}




	/*=======================================*/
	public function Pending_Register_User()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$data['fatchUserList'] = $this->User_model->fatch_user();
			$data['content'] = 'register_user/pending_user_page';
			$this->load->view('dashboard_layout', $data);
		}
	}




	/*=======================================*/
	public function Approve_User()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$data['fatchUserList'] = $this->User_model->fatch_user();
			$data['content'] = 'register_user/approve_user_page';
			$this->load->view('dashboard_layout', $data);
		}
	}




	/*=====================================*/
	public function create_id_pass($id = null)
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			if ($this->User_model->fatch_single_user_data($id)) {
				$data['userData'] = $this->User_model->fatch_single_user_data($id);
			}
			$this->load->view('register_user/create_memberId_pass_page',$data);
		}
	}




	/*=====================================*/
	public function view_Single_User($id = null)
	{
		if ($this->User_model->fatch_single_user_data($id)) {
			$data['userData'] = $this->User_model->fatch_single_user_data($id);
			$data['accessCategory'] = $this->User_model->fatch_access_user_data($id);
		}
		$this->load->view('register_user/view_single_user_page',$data);
	}



	/*=====================================*/
	public function Delete_Cate_Access($id = null)
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			if ($this->User_model->Delete_Cate_Access($id)) :
				echo json_encode(array('status' => TRUE));
			else:
				echo json_decode(array('status' => TRUE));
			endif;
		}
	}



	/*=====================================*/
	public function update_Member_Id_Pass($id = null)
	{
		$expDate = $this->input->post('date');
		$pass = $this->input->post('password');
		$qu 	= $this->db->where('user_id',$id)->get('tbl_users');
		$userInfo 	= $qu->row();

		$member_id 	= $this->input->post('mId');
		$pass 		= $this->input->post('password');

		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			if(empty($pass)):
				if ($this->User_model->update_Member_Id_Pass($id)) :

					$Phone 	= 	"+88".$userInfo->u_phone;
					$SMS 	=	"Dear ".$userInfo->u_name.",\nYour account has been activated, now you can login your account.\n\nYour Member ID : ".$member_id."\n"."Password : ".$pass."";
				
					// Login Info
					$username 	= "LinkUpBD";
					$password 	= "A@7mmmm47474";
					$from 		= "Link-UpTech";
					$longsms 	= "longSMS";	
					
					$urltopost = "http://api.infobip.com/api/v3/sendsms/plain";
					$datatopost = array (
					"user" => $username,
					"password" => $password,
					"type" => $longsms,
					"sender" => $from,
					"SMSText" => $SMS,
					"GSM" => $Phone
					);
					
					$ch = curl_init ($urltopost);
					curl_setopt ($ch, CURLOPT_POST, true);
					curl_setopt ($ch, CURLOPT_POSTFIELDS, $datatopost);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
					$result = curl_exec($ch);
					curl_close($ch);	
					
					if($result<0){
						//$mystatus = "Message not send";
						}
					else{
						//$mystatus = "Message Was Send Successfully!!!";
						}
						echo json_encode(array("status" => TRUE));

				else :
					echo json_decode(array("status" => FALSE));
				endif;
			else:
				if ($this->User_model->update_Member_Id_Pass($id)) :

					$Phone 	= 	"+88".$userInfo->u_phone;
					$SMS 	=	"Dear ".$userInfo->u_name.",\nYour Account has been activated.\nhttp://myunnayan.com/signIn\nYour Member ID : ".$member_id."\n"."Password : ".$pass."\n"."Expiration Date : ".$expDate."\n\nRespectfully,\nUnnayan Team";
				
					// Login Info
					$username 	= "LinkUpBD";
					$password 	= "A@7mmmm47474";
					$from 		= "Link-UpTech";
					$longsms 	= "longSMS";	
					
					$urltopost = "http://api.infobip.com/api/v3/sendsms/plain";
					$datatopost = array (
					"user" => $username,
					"password" => $password,
					"type" => $longsms,
					"sender" => $from,
					"SMSText" => $SMS,
					"GSM" => $Phone
					);
					
					$ch = curl_init ($urltopost);
					curl_setopt ($ch, CURLOPT_POST, true);
					curl_setopt ($ch, CURLOPT_POSTFIELDS, $datatopost);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
					$result = curl_exec($ch);
					curl_close($ch);	
					
					if($result<0){
						//$mystatus = "Message not send";
						}
					else{
						//$mystatus = "Message Was Send Successfully!!!";
						}
						echo json_encode(array("status" => TRUE));

				else :
					echo json_decode(array("status" => FALSE));
				endif;
			endif;
		}
	}



	/*=====================================*/
	public function more_category_access($id = null)
	{
		if (!$this->Admin_model->is_user_loged_in())
		{
			redirect('login/?logged_in_first');
		}
		else{
			if ($this->User_model->more_category_access($id)) {
				$data['userData'] = $this->User_model->more_category_access($id);
				$data['accessCategory'] = $this->User_model->fatch_access_user_data($id);
				$data['withoutAccessCategory'] = $this->User_model->fatch_without_access_user_data($id);
			}
			$this->load->view('register_user/category_access',$data);
		}
	}





	/*=====================================*/
	public function insert_more_category_access()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			if ($this->User_model->insert_more_category_access()) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('ApproveUser');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('ApproveUser');
			endif;
		}
	}





	/*=======================================*/
	public function user_delete()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$id = $this->input->post('id');
			if($this->User_model->user_delete($id)):
				echo json_encode(array('status' => TRUE));
			else:
				echo json_decode(array('status' => TRUE));
			endif;
		}
	}



	/*=====================================*/
	public function edit_user_info($id = null)
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			if ($this->User_model->edit_user_info($id)) {
				$data['editData'] = $this->User_model->edit_user_info($id);
			}
			$this->load->view('FrontEnd/user_dashboard/edit_profile',$data);
		}
	}


	/*=====================================*/
	public function update_user_info($id = null)
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			if ($this->User_model->update_user_info($id)) :
				$data['message']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('User-Dashboard');
			else :
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('User-Dashboard');
			endif;
		}
	}



	/*=====================================*/
	public function change_Profile($id = null)
	{
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			if ($this->User_model->change_Profile($id)) {
				$data['editData'] = $this->User_model->change_Profile($id);
			}
			$this->load->view('FrontEnd/user_dashboard/change_profile',$data);
		}
	}


	/*=====================================*/
	public function Update_Profile($id = null)
	{
		$old = $this->input->post('old');
		if (!$this->User_model->is_user_loged_in_dashboard()) 
		{
			$data['check'] = 'Unsuccessfully';
			$this->session->set_flashdata($data);
			redirect('signIn/?logged_in_first');
		}
		else{
			if($file_name = $this->changeProfile_upload() ){
				$data=array("changeProfile" => $file_name);

				if ($this->User_model->Update_Profile($id,$file_name)) :

					unlink('libs/upload_pic/user_pic/'.$old);

					$data['message']="Change Successfully!";
					$this->session->set_flashdata($data);
					redirect('User-Dashboard');
				else :
					$data['message2']="Change Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('User-Dashboard');
				endif;
			}else{
				$data['message2']="Image Upload Failed!";
				$this->session->set_flashdata($data);
				redirect('add_gallery');
			}
		}
	}




	/*=================================*/
	public function changeProfile_upload(){
		if($this->User_model->is_user_loged_in_dashboard() ){
			$type = explode('.', $_FILES['changeProfile']['name']);
			$type = $type[count($type)-1];
			$file_name= uniqid(rand()).'.'.$type;

			if( in_array($type, array('jpg', 'JPG', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

					if( is_uploaded_file( $_FILES['changeProfile']['tmp_name'] ) ){

					move_uploaded_file( $_FILES['changeProfile']['tmp_name'], './libs/upload_pic/user_pic/'.$file_name );
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





	/*=======================================*/
	public function user_change_password($id)
	{	
		$this->form_validation->set_rules('new_pass', 'Password', 'trim|min_length[6]');
		$this->form_validation->set_rules('re_pass', 'Confirm Password', 'required|trim|min_length[6]|matches[new_pass]');

		if($this->form_validation->run() == FALSE)
		{
			echo json_decode(array('status' => TRUE));
		}
		else{
			if($this->User_model->user_change_password($id)):
				echo json_encode(array('status' => TRUE));
			else:
				echo json_decode(array('status' => TRUE));
			endif;
		}
	}



	/*=======================================*/
	/*=======================================*/
	public function send_user_feedback()
	{
		$this->form_validation->set_rules('fbname', 'name', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->form_validation->set_rules('phone', 'phone', 'required|trim');
		$this->form_validation->set_rules('message', 'message', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'Contact_Us';
			$this->load->view('FrontEnd/homeMaster',$data);	
		}
		else{
			if(!isset($_FILES['ffile']) || $_FILES['ffile']['error'] == UPLOAD_ERR_NO_FILE)
				{
				$file_name = 0;
				if($this->User_model->insert_user_feedback($file_name)):
					$data['message']="Send Your Feedback Successfully!";
					$this->session->set_flashdata($data);
					redirect('ContactUs');
				else:
					$data['message2']="Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('ContactUs');
				endif;
			}
			else{
				if($file_name = $this->feedback_file_upload() ){
					$data=array("ffile" => $file_name);

					if($this->User_model->insert_user_feedback($file_name)):
						$data['message']="Send Your Feedback Successfully!";
						$this->session->set_flashdata($data);
						redirect('ContactUs');
					else:
						$data['message2']="Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('ContactUs');
					endif;
				}else{
					$data['message2']="Image Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('ContactUs');
				}
			}
		}
	}

	/*======================================*/
	public function feedback_file_upload(){
		$type = explode('.', $_FILES['ffile']['name']);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg', 'JPG', 'png', 'doc','pdf', 'docx','DOC','DOCX','PDF', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $_FILES['ffile']['tmp_name'] ) ){

				move_uploaded_file( $_FILES['ffile']['tmp_name'], './libs/upload_pic/feddback_file/'.$file_name );
				return $file_name;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}





	/*=======================================*/
	/*=======================================*/
	public function View_Comment()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$data['allSeenData'] = $this->User_model->fatch_all_Comment();
			$data['content'] = 'comment/seenComment';
			$this->load->view('dashboard_layout', $data);
		}
	}



	/*=======================================*/
	/*=======================================*/
	public function delete_Comment($id=null)
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$this->User_model->delete_Comment($id);
			$data['message'] = 'Delete Successfully';
			$this->session->set_flashdata($data);
			redirect('ViewComment');
		}
	}





	/*=======================================*/
	/*=======================================*/
	public function single_feedback($id = null)
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$this->User_model->update_feedback_status($id);
			$data['singleData'] = $this->User_model->fatch_single_user_feedback($id);
			$data['content'] = 'feedback/singleFeedback';
			$this->load->view('dashboard_layout', $data);
		}
	}


	/*=======================================*/
	/*=======================================*/
	public function seenFeedback()
	{
		if (!$this->Admin_model->is_user_loged_in()) 
		{
			redirect('login/?logged_in_first');
		}
		else{
			$data['allSeenData'] = $this->User_model->fatch_seen_user_feedback();
			$data['content'] = 'feedback/seenFeedback';
			$this->load->view('dashboard_layout', $data);
		}
	}





	/*===============SignIn Portion===================*/
	/*===============SignIn Portion===================*/
	/*===============SignIn Portion===================*/
	public function signIn_page()
	{
		$data['content'] = 'signIn';
		$this->load->view('FrontEnd/homeMaster', $data);
	}

	
	/*==================================*/
	public function login_user_data_check()
	{
		$this->form_validation->set_rules('member_id', 'Member Id', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			echo json_decode(array('status' => TRUE));
		}
		else{
			$date = date('Y-m-d');
			$attr = array(
				'u_member_id'	 => 	$this->input->post('member_id'),  
				'u_validity <'	 => 	$date, 
			);

			$qu = $this->db->get_where('tbl_users', $attr);

			if($qu->num_rows() == 1):
				echo json_decode(array('status' => TRUE));
			else:
				//$this->User_model->post_check_expiration_date();
				$res =  $this->User_model->user_login_data_check();
				if($res)
				{
					echo json_encode(TRUE);
				}
				else{
					echo json_encode(FALSE);
				}
			endif;
		}
	}


	/*===================================*/
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->sess_destroy();
		redirect ('/?logout=Success'); 
	}


}
