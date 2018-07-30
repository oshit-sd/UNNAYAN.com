<?php

/**
* 
*/
class Service_model extends CI_Model
{
	/*====================================================================*/
	public function insert_Service()
	{
		$attr = array(
				'details' 		=> 	$this->input->post('details')
			);
		$res = $this->db->insert('tbl_service', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*====================================================================*/
	public function all_Service_text()
	{
		$qu = $this->db->get('tbl_service');
		$res = $qu->result();
		return $res;
	}


	/*====================================================================*/	
	public function edit_Service_data_update($id)
	{
		$attr = array(
			'details' 		=> 	$this->input->post('details')
		);

		$this->db->where('ser_id', $id);
		$qu = $this->db->update('tbl_service', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


}