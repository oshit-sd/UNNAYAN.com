<?php

/**
* 
*/
class Contact_model extends CI_Model
{
	/*===================================*/
	public function insert_contact_us()
	{
		$attr = array(
				'details' 	=>	 $this->input->post('details'),
				'email' 	=>	 $this->input->post('email'),
				
			);
		$res = $this->db->insert('contact', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	
	/*===================================*/
	public function show_contact_us()
	{
		$qu = $this->db->get('contact');
		$res = $qu->result();
		return $res;
	}


	/*===================================*/	
	public function Contact_data_update($id)
	{
		$attr = array(
			'details' 	=>	 $this->input->post('details'),
			'email' 	=>	 $this->input->post('email')
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('contact', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}









/*===================================*/
	public function insert_footer_contact_us()
	{
		$attr = array(
				'details' 	=>	 $this->input->post('details'),
				
			);
		$res = $this->db->insert('footer_contact_us', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	
	/*===================================*/
	public function show_footer_contact_us()
	{
		$qu = $this->db->get('footer_contact_us');
		$res = $qu->result();
		return $res;
	}


	/*===================================*/	
	public function Contact_footer_data_update($id)
	{
		$attr = array(
			'details' 	=>	 $this->input->post('details'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('footer_contact_us', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

}