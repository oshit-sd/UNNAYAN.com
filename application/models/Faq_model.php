<?php

/**
* 
*/
class Faq_model extends CI_Model
{
	/*====================================================================*/
	public function insert_Faq()
	{
		$attr = array(
				'details' 		=> 	$this->input->post('details')
			);
		$res = $this->db->insert('tbl_faq', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*====================================================================*/
	public function all_Faq_text()
	{
		$qu = $this->db->get('tbl_faq');
		$res = $qu->result();
		return $res;
	}



	/*====================================================================*/	
	public function edit_Faq_data_update($id)
	{
		$attr = array(
			'details' 		=> 	$this->input->post('details')
		);

		$this->db->where('f_id', $id);
		$qu = $this->db->update('tbl_faq', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


}