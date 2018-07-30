<?php

/**
* 
*/
class About_model extends CI_Model
{
	/*====================================================================*/
	public function insert_about()
	{
		$attr = array(
				'details' 		=> 	$this->input->post('details')
			);
		$res = $this->db->insert('about_us', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*====================================================================*/
	public function all_about_text()
	{
		$qu = $this->db->get('about_us');
		$res = $qu->result();
		return $res;
	}




	/*====================================================================*/	
	public function edit_about_data_update($id)
	{
		$attr = array(
			'details' 		=> 	$this->input->post('details')
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('about_us', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}











	/*====================Footer About Us======================*/
	/*====================Footer About Us======================*/
	/*====================Footer About Us======================*/
	/*====================Footer About Us======================*/
	public function insert_footer_about()
	{
		$attr = array(
				'details' 		=> 	$this->input->post('details')
			);
		$res = $this->db->insert('footer_about_us', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*====================================================================*/
	public function all_about_footer_text()
	{
		$qu = $this->db->get('footer_about_us');
		$res = $qu->result();
		return $res;
	}




	/*====================================================================*/	
	public function edit_about_footer_data_update($id)
	{
		$attr = array(
			'details' 		=> 	$this->input->post('details')
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('footer_about_us', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}




}