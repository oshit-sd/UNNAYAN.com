<?php

/**
* 
*/
class Terms_model extends CI_Model
{
	/*====================================================================*/
	public function insert_Terms()
	{
		$attr = array(
				'details' 		=> 	$this->input->post('details')
			);
		$res = $this->db->insert('tbl_terms', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*====================================================================*/
	public function all_Terms_text()
	{
		$qu = $this->db->get('tbl_terms');
		$res = $qu->result();
		return $res;
	}


	/*====================================================================*/	
	public function edit_Terms_data_update($id)
	{
		$attr = array(
			'details' 		=> 	$this->input->post('details')
		);

		$this->db->where('ter_id', $id);
		$qu = $this->db->update('tbl_terms', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


}