<?php

/**
* 
*/
class Admin_model extends CI_Model
{
	/*===================================*/	
	public function admin_login_data_check()
	{
		// echo "no Error";
		$name = $this->input->post('username');
		$pass = md5($this->input->post('password'));

		$attr = array(
			'user_name' => $name, 
			'password' => $pass, 
		);

		$res = $this->db->get_where('create_admin', $attr);
		// echo "<pre>";
		// var_dump($res); return;

		if($res->num_rows() == 1)
		{
			$attr = array(
				'admin_id' => $res->row(0)->id, 
				'name' => $name
			);
			$this->session->set_userdata($attr);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	/*===================================*/
	public function is_user_loged_in()
	{
		return $this->session->userdata('admin_id') != FALSE;
	}


	/*===================================*/
	public function add_admin_data_insert()
	{
		$pass = md5($this->input->post('password'));
		$attr = array(
			'fullname' 		=> $this->input->post('fullname'), 
			'phone' 		=> $this->input->post('phone'), 
			'email' 		=> $this->input->post('email'), 
			'user_name' 	=> $this->input->post('user_name'), 
			'password' 		=> $pass, 
			'admin_type' 	=> 'a', 
			'create_date' 	=> date('Y-m-d'), 
		);

		$insert = $this->db->insert('create_admin', $attr);

		$adminID =  $this->db->insert_id();
		$attr2 = array(
			'admin_id' 		=> $adminID
		);
		$insert2 = $this->db->insert('tbl_admin_access', $attr2);


		if($insert)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	/*===================================*/
	public function all_admin_list()
	{
		$qu = $this->db->order_by('id', 'desc')->get('create_admin');
		$res = $qu->result();
		return $res;
	}


	/*===================================*/
	public function admin_delete($id = null)
	{
		$qu = $this->db->delete('create_admin', array('id' => $id ));
		if ( $this->db->affected_rows() == 1) {
			
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*===================================*/
	public function edit_admin($id = null)
	{
		$attr = array('id' =>  $id);
		
		$qu = $this->db->get_where('create_admin', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*===================================*/
	public function edit_admin_data_update($id = null)
	{
		$pass = md5($this->input->post('password'));
		if(empty($pass)){
			$attr = array(
				'fullname' 		=> $this->input->post('fullname'), 
				'phone' 		=> $this->input->post('phone'), 
				'email' 		=> $this->input->post('email'), 
				'user_name' 	=> $this->input->post('user_name'), 
			);
			
			$this->db->where('id', $id);
			$qu = $this->db->update('create_admin', $attr);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}
		else{
			$attr = array(
				'fullname' 		=> $this->input->post('fullname'), 
				'phone' 		=> $this->input->post('phone'), 
				'email' 		=> $this->input->post('email'), 
				'user_name' 	=> $this->input->post('user_name'), 
				'password' 		=> $pass, 
			);
			
			$this->db->where('id', $id);
			$qu = $this->db->update('create_admin', $attr);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}
		
	}




	/*===================================*/
	public function access_admin($id = null)
	{
		$attr = array('admin_id' =>  $id);
		
		$qu = $this->db->get_where('tbl_admin_access', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}




	/*===================================*/
	public function define_access($id = null)
	{
		$attr = array(
			'pending_reg_user' 	=> $this->input->post('pending_reg_user'), 
			'approve_user' 		=> $this->input->post('approve_user'), 
			'pending_post' 		=> $this->input->post('pending_post'), 
			'approve_post' 		=> $this->input->post('approve_post'), 
			'price_type' 		=> $this->input->post('price_type'), 
			'category' 			=> $this->input->post('category'), 
			'location' 			=> $this->input->post('location'), 
			'about_us' 			=> $this->input->post('about_us'), 
			'service' 			=> $this->input->post('service'), 
			'terms_con' 		=> $this->input->post('terms_con'), 
			'faq' 				=> $this->input->post('faq'), 
			'payment' 			=> $this->input->post('payment'), 
			'contact_us' 		=> $this->input->post('contact_us'), 
			'photo_gallery' 	=> $this->input->post('photo_gallery'), 
			'conporate' 		=> $this->input->post('conporate'), 
			'footer_about' 		=> $this->input->post('footer_about'), 
			'footer_contact' 	=> $this->input->post('footer_contact'), 
			'slider' 			=> $this->input->post('slider'), 
			'reg_user' 			=> $this->input->post('reg_user'), 
			'user_post' 		=> $this->input->post('user_post'), 
			'main_menu' 		=> $this->input->post('main_menu'), 
			'footer' 			=> $this->input->post('footer')
		);
		
		$this->db->where('admin_id', $id);
		$qu = $this->db->update('tbl_admin_access', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
		
	}





}