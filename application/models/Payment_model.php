<?php

/**
* 
*/
class Payment_model extends CI_Model
{
	/*====================================================================*/
	public function insert_Payment()
	{
		$attr = array(
				'details' 		=> 	$this->input->post('details')
			);
		$res = $this->db->insert('tbl_payment_details', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*====================================================================*/
	public function all_Payment_text()
	{
		$qu = $this->db->get('tbl_payment_details');
		$res = $qu->result();
		return $res;
	}


	/*====================================================================*/	
	public function edit_Payment_data_update($id)
	{
		$attr = array(
			'details' 		=> 	$this->input->post('details')
		);

		$this->db->where('pay_id', $id);
		$qu = $this->db->update('tbl_payment_details', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


}