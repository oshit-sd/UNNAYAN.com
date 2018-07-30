<?php

/**
* 
*/
class PhoneCode_model extends CI_Model
{
	/*======================================*/	
	public function PhoneCode_insert()
	{

		$attr = array(
			'phone_code'		=>	$this->input->post('phone_code'),
			'country'			=>	$this->input->post('country'),
		);

		$res = $this->db->insert('tbl_phone_code', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*==================================*/
	public function all_PhoneCode_list()
	{
		$qu = $this->db->get('tbl_phone_code');
		$res = $qu->result();
		return $res;
	}

	/*=====================================*/
	public function edit_PhoneCode($id = null)
	{
		$attr = array('id' =>  $id);
		
		$qu = $this->db->get_where('tbl_phone_code', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*=======================================*/
	public function update_PhoneCode($id = null)
	{

		$attr = array(
			'phone_code'		=>	$this->input->post('phone_code'),
			'country'			=>	$this->input->post('country'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_phone_code', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}




}