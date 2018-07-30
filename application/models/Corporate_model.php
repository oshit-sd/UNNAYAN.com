<?php

/**
* 
*/
class Corporate_model extends CI_Model
{
	/*====================================================================*/	
	public function insert_Corporate($file_name)
	{
		$attr = array(
			'name'		=>	$this->input->post('name'),
			'details'	=>	$this->input->post('details'),
			'pic'		=>	$file_name,
			'status'	=>	'a',
		);

		$res = $this->db->insert('tbl_corporate', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	
	/*====================================================================*/
	public function all_Corporate_list()
	{
		$qu = $this->db->where('status','a')->order_by('id','desc')->get('tbl_corporate');
		$res = $qu->result();
		return $res;
	}

	
	/*====================================================================*/
	public function Corporate_image_for_home()
	{
		$qu = $this->db->order_by('id','desc')->limit(4)->get('tbl_corporate');
		$res = $qu->result();
		return $res;
	}


	/*====================================================================*/
	public function edit_Corporate($id = null)
	{
		$attr = array('id' =>  $id);
		
		$qu = $this->db->get_where('tbl_corporate', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*====================================================================*/
	public function update_Corporate($id)
	{

		$attr = array(
			'name'		=>	$this->input->post('name'),
			'details'	=>	$this->input->post('details'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_corporate', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*====================================================================*/
	public function update_Corporate_with_image($file_name, $id)
	{

		$attr = array(
			'name'		=>	$this->input->post('name'),
			'details'	=>	$this->input->post('details'),
			'pic'		=>	$file_name,
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_corporate', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*====================================================================*/
	public function Corporate_delete($id = null)
	{
		$attr = array(
			'status'	=>	'd',
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_corporate', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}	
	}



}