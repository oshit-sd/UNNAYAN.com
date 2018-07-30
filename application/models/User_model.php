<?php

/**
* 
*/
class User_model extends CI_Model
{
	/*====================================================================*/	
	public function user_login_data_check()
	{

		$attr = array(
			'u_member_id'	 => 	$this->input->post('member_id'), 
			'u_password'	 => 	md5($this->input->post('password')), 
		);
		$result = $this->db->get_where('tbl_users', $attr);


		if($result->num_rows() == 1)
		{
			$attr2 = array(
				'user_id'	 => $result->row(0)->user_id, 
				'user_type'	 => $this->input->post('u_type'), 
				'user_name'	 => $result->row(0)->u_name, 
			);
			$this->session->set_userdata($attr2);
			return TRUE;
		}
		else{
			return FALSE;
		}

	}


	/*======================================*/
	// public function post_check_expiration_date()
	// {
	// 	$date1=date_create(date('Y-m-d'));
	    
	// 	$memberID 	= $this->input->post('member_id');
	// 	$userQu 	= $this->db->where('u_member_id',$memberID)->get('tbl_users');
	// 	$userID 	= $userQu->row();

	// 	$postQu 	= $this->db->where('p_add_by',$userID->user_id)->get('tbl_post');
	// 	$FatchPost 	= $postQu->result();

	// 	foreach($FatchPost as $post):
	// 		$date2=date_create($post->p_date);
	// 	    $diff=date_diff($date1,$date2);
	// 	    $days =  $diff->format("%a");

	// 	    if ($days > 30) {
	// 	    	$attr = array(
	// 				'p_status' 		=> 	'd'
	// 			);
		
	// 			$this->db->where('post_id', $post->post_id);
	// 			$qu = $this->db->update('tbl_post', $attr);
	// 		}

	// 	endforeach;
	// }



	/*======================================*/
	public function post_check_expiration_date()
	{
		$date1=date_create(date('Y-m-d'));
	   
		$postQu 	= $this->db->get('tbl_post');
		$FatchPost 	= $postQu->result();

		foreach($FatchPost as $post):
			$date2=date_create($post->p_date);
		    $diff=date_diff($date1,$date2);
		    $days =  $diff->format("%a");

		    if ($days > 30) {
		    	$attr = array(
					'p_status' 		=> 	'd'
				);
		
				$this->db->where('post_id', $post->post_id);
				$qu = $this->db->update('tbl_post', $attr);
			}

		endforeach;
	}



	/*======================================*/
	public function is_user_loged_in_dashboard()
	{
		return $this->session->userdata('user_id') != FALSE;
	}


	/*======================================*/
	public function register_user_data_insert($file_name)
	{
		$category = $this->input->post('category');
		// if($category): 
		// 	$cate = implode(',', $category);
		// else: 
		// 	$cate= 0;
		// endif;
		$attr = array(
			'u_name' 		=> $this->input->post('f_name'), 
			'u_phone' 		=> $this->input->post('phone'), 
			'u_phone_code' 	=> $this->input->post('Ccode'), 
			'u_email' 		=> $this->input->post('email'),    
			'u_file' 		=> $file_name,  
			'NIDpassNumber' => $this->input->post('NIDpassNumber'),  
			'u_agree' 		=> $this->input->post('agree'),  
			'u_status' 		=> 'p',  
		);

		$insert = $this->db->insert('tbl_users', $attr);
		$insert_id = $this->db->insert_id();
		// echo "<pre>";
		// print_r($category); exit();
		foreach($category as $cate):
			$attr2 = array(
				'acs_user_id' 	=> $insert_id, 
				'acs_category' 	=> $cate, 
			);
			$insert2 = $this->db->insert('tbl_access', $attr2);
		endforeach; 
		if($insert)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}



	/*=========================================*/
	public function fatch_user()
	{
		$this->db->select('*');    
		$this->db->from('tbl_users');
		$this->db->join('tbl_country', 'tbl_country.ct_id = tbl_users.u_country', 'left');
		$this->db->join('tbl_city', 'tbl_city.cty_id = tbl_users.u_area', 'left');

		$query = $this->db->order_by('tbl_users.user_id', 'desc')->get();

		$res = $query->result();
		return $res;
	}



	/*======================================*/
	public function fatch_access_user_data($uid = null)
	{
		$this->db->select('*');    
		$this->db->from('tbl_access');
		$this->db->join('category', 'tbl_access.acs_category = category.cat_id');
		$query = $this->db->where('tbl_access.acs_user_id',$uid)->get();

		$res = $query->result();
		return $res;
	}

	/*======================================*/
	public function fatch_single_user_data($id = null)
	{
		$attr = array('user_id' =>  $id);
		
		$qu = $this->db->get_where('tbl_users', $attr);
		
		if ($qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*======================================*/
	public function edit_user_info($id = null)
	{
		$this->db->select('*');    
		$this->db->from('tbl_users');
		$this->db->join('tbl_country', 'tbl_country.ct_id = tbl_users.u_country', 'left');
		$this->db->join('tbl_city', 'tbl_city.cty_id = tbl_users.u_area', 'left');

		$query = $this->db->where('tbl_users.user_id',$id)->limit(1)->get();

		$res = $query->result();
		return $res;
	}



	/*===========================*/
	public function update_user_info($id = null)
	{
		$attr = array(
			'u_name' 			=> $this->input->post('f_name'),
			'u_date_of_birth' 	=> $this->input->post('dateBirth'),
			'u_email' 			=> $this->input->post('email'),
			'u_phone' 			=> $this->input->post('phone'), 
			'u_phone_code' 		=> $this->input->post('Ccode'), 
			'u_address' 		=> $this->input->post('address'),
			'u_area' 			=> $this->input->post('city'),
			'u_country' 		=> $this->input->post('country'),
		);
		
		$this->db->where('user_id', $id);
		$qu = $this->db->update('tbl_users', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}



	/*=====================================*/
	public function change_Profile($id = null)
	{
		$attr = array('user_id' =>  $id);
		$qu = $this->db->get_where('tbl_users', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*===========================*/
	public function Update_Profile($id = null,$file_name)
	{
		$attr = array('u_pic' => $file_name);
		
		$this->db->where('user_id', $id);
		$qu = $this->db->update('tbl_users', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}



	/*===================================*/
	public function Delete_Cate_Access($id)
	{
		$qu = $this->db->delete('tbl_access', array('acs_id' => $id));
		if ( $this->db->affected_rows() == 1) {
			return TRUE;
		}else {
			return FALSE;
		}
	}	




	/*===========================*/
	public function update_Member_Id_Pass($id = null)
	{
		$qu2 = $this->db->get('contact');
		$contactMail = $qu2->row();

		$qu3 	= $this->db->where('user_id',$id)->get('tbl_users');
		$userInfo 	= $qu3->row();

		$pass = $this->input->post('password');
		$md5Pass = md5($pass);

		if(empty($pass)):
			$attr = array(
				'u_member_id' 		=> $this->input->post('mId'),
				'u_status' 			=> 'a',
				'u_validity' 		=> $this->input->post('date'),
			);
			
			$this->db->where('user_id', $id);
			$qu = $this->db->update('tbl_users', $attr);
			
			if ( $this->db->affected_rows()) {

				if(isset($userInfo->u_email)):
					// Send Mail===========
					$sendEmail 	= $userInfo->u_email;
					$email 		= $contactMail->email;
					$member_id 	= $this->input->post('mId');
					$pass 		= $this->input->post('password');
					$info 		= "Your password has been activated, now you can login your account";

					$message = '<html><body>';
					$message .= '<h3 style="color:#297db4; ">' . "Form: " . "$email".'</h3>';
					$message .= '<p style="color:#080; font-size: 15px; "><br/>'. "$info".'</p>';
					$message .= '<h3 style="color:#297db4; ">' . "Member ID : " . "$member_id".'</h3>';
					$message .= '<h3 style="color:#297db4; ">' . "Password : " . "$pass".'</h3>';
					$message .= '<h3 style="color:#041E64; ">' . " UNNAYAN " .'</h3>';
					$message .= '</html></body>';

					$headers = "Form: " . strip_tags($email) . "\r\n";
					$headers .= "Reply-To: " . strip_tags($email) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

					$isSuccess = mail($sendEmail, 'UNNAYAN', $message, $headers);
				endif;

				return TRUE;
			}else {
				return FALSE;
			}
		else:
			$attr = array(
				'u_member_id' 		=> $this->input->post('mId'),
				'u_password' 		=> $md5Pass, 
				'u_status' 			=> 'a',
				'u_validity' 		=> $this->input->post('date'),
			);
			
			$this->db->where('user_id', $id);
			$qu = $this->db->update('tbl_users', $attr);
			
			if ( $this->db->affected_rows()) {

				if(isset($userInfo->u_email)):
					// Send Mail===========
					$sendEmail 	= $userInfo->u_email;
					$email 		= $contactMail->email;
					$member_id 	= $this->input->post('mId');
					$pass 		= $this->input->post('password');
					$date 		= $this->input->post('date');
					$info 		= "Dear ".$userInfo->u_name."\nYour account has been activated";

					$message = '<html><body>';
					$message .= '<h3 style="color:#297db4; ">' . "Form: " . "$email".'</h3>';
					$message .= '<p style="color:#080; font-size: 15px; "><br/>'. "$info".'</p>';
					$message .= '<h3 style="color:#297db4; ">' . "\n" . "http://myunnayan.com/signIn".'</h3>';
					$message .= '<h3 style="color:#297db4; ">' . "Your Member ID : " . "$member_id".'</h3>';
					$message .= '<h3 style="color:#297db4; ">' . "Password : " . "$pass".'</h3>';
					$message .= '<h3 style="color:#297db4; ">' . "Expiration Date : " . "$date".'</h3>';
					$message .= '<h3 style="color:#041E64; ">' . "\nRespectfully,\n Unnayan Team " .'</h3>';
					$message .= '</html></body>';

					$headers = "Form: " . strip_tags($email) . "\r\n";
					$headers .= "Reply-To: " . strip_tags($email) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

					$isSuccess = mail($sendEmail, 'UNNAYAN', $message, $headers);
				endif;

				return TRUE;
			}else {
				return FALSE;
			}
		endif;
	}




	/*======================================*/
	public function more_category_access($id = null)
	{
		$attr = array('user_id' =>  $id);
		
		$qu = $this->db->get_where('tbl_users', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*======================================*/
	public function fatch_without_access_user_data($uid = null)
	{
		$query = $this->db->query('select * from category where cat_id not in (select acs_category from tbl_access where acs_user_id='.$uid.')');

		$res = $query->result();
		return $res;
	}



	/*======================================*/
	public function insert_more_category_access()
	{
		$category = $this->input->post('category');

		foreach($category as $cate):
			$attr = array(
				'acs_user_id' 	=> $this->input->post('userID'),
				'acs_category' 	=> $cate, 
			);
			$insert = $this->db->insert('tbl_access', $attr);
		endforeach; 

		if($insert)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}




	/*=====================================*/
	public function user_delete($id = null)
	{
		$attr = array(
			'u_status' 		=> 'd'
		);
		
		$this->db->where('user_id', $id);
		$qu = $this->db->update('tbl_users', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}



	/*=====================================*/
	public function user_change_password($id = null)
	{
		$attr = array(
			'user_id'	 	=> 	$id, 
			'u_password'	=> 	md5($this->input->post('old_pass')), 
		);
		$result = $this->db->get_where('tbl_users', $attr);

		if($result->num_rows() == 1):

			$attr2 = array(
				'u_password' 	=> 	md5($this->input->post('new_pass'))
			);
			
			$this->db->where('user_id', $id);
			$qu = $this->db->update('tbl_users', $attr2);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		else:
			return FALSE;
		endif;
	}



	/*=====================================*/
	public function insert_user_feedback($file_name)
	{
		$qu2 = $this->db->get('contact');
		$res2 = $qu2->row();

		$attr = array(
			'fb_name' 		=> $this->input->post('fbname'), 
			'fb_phone' 		=> $this->input->post('phone'), 
			'fb_email' 		=> $this->input->post('email'),    
			'fb_message' 	=> $this->input->post('message'),    
			'fb_member_id' 	=> $this->input->post('fb_member_id'),    
			'fb_file' 		=> $file_name,    
			'fb_status' 	=> 'p',    
		);

		$insert = $this->db->insert('tbl_feedback', $attr);

		if($insert): 


		// Send Mail===========
		$sendEmail 	= $res2->email;
		$name 		= $this->input->post('fbname');
		$email 		= $this->input->post('email');
		$phone 		= $this->input->post('phone');
		$mem_id 	= $this->input->post('fb_member_id');
		$info 		= $this->input->post('message');

		$message = '<html><body>';
		$message .= '<h3 style="color:#297db4; ">' . "Form: " . "$email".'</h3>';
		$message .= '<p style="color:#080; font-size: 18px; "><br/>'. "$info".'</p>';
		$message .= '<h3 style="color:#297db4; ">' . "Name : " . "$name".'</h3>';
		$message .= '<h3 style="color:#297db4; ">' . "Phone: " . "$phone".'</h3>';
		$message .= '<h3 style="color:#297db4; ">' . "Member ID: " . "$mem_id".'</h3>';
		$message .= '</html></body>';

		$headers = "Form: " . strip_tags($email) . "\r\n";
		$headers .= "Reply-To: " . strip_tags($email) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		$isSuccess = mail($sendEmail, 'UNNAYAN', $message, $headers);

			return TRUE; 
		else: 
			return FALSE;
		endif;
	}


	/*=====================================*/
	public function fatch_pending_user_feedback()
	{
		$qu = $this->db->where('fb_status','p')->order_by('fb_id','desc')->get('tbl_feedback');
		return $qu->result();
	}


	/*===========================*/
	public function update_feedback_status($id = null)
	{
		$attr = array(
			'fb_status' 			=> 'a',
		);
		
		$this->db->where('fb_id', $id);
		$qu = $this->db->update('tbl_feedback', $attr);

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*=====================================*/
	public function fatch_single_user_feedback($id = null)
	{
		$qu = $this->db->where('fb_id',$id)->get('tbl_feedback');
		$result = $qu->result();
		if ( $this->db->affected_rows()) {
			return $result;
		}else {
			return FALSE;
		}
	}



	/*=====================================*/
	public function fatch_seen_user_feedback()
	{
		$qu = $this->db->where('fb_status','a')->order_by('fb_id','desc')->get('tbl_feedback');
		return $qu->result();
	}



	/*=======================================*/
	/*=======================================*/
	public function insert_comment()
	{
		$attr = array(
				'comment' 		=> 	$this->input->post('comment'),
				'date' 			=> 	date('Y-m-d'),
				'com_user' 		=> 	$this->session->userdata('user_id')
			);
		$res = $this->db->insert('tbl_comment', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	

	/*=======================================*/
	/*=======================================*/
	public function fatch_all_Comment()
	{
		$this->db->select('*');
		$this->db->from('tbl_comment');
		$this->db->join('tbl_users', 'tbl_comment.com_user = tbl_users.user_id');
		$qu = $this->db->order_by('tbl_comment.id','desc')->get();
		$res = $qu->result();
		return $res;
	}


	/*==================================*/
	public function delete_Comment($id = null)
	{
		$qu = $this->db->delete('tbl_comment', array('id' => $id) );
		if ( $this->db->affected_rows() == 1) {
			return TRUE;
		}else {
			return FALSE;
		}
	}






}