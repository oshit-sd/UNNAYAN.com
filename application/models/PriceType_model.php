<?php

/**
* 
*/
class PriceType_model extends CI_Model
{
	/*======================================*/	
	public function PriceType_insert()
	{

		$attr = array(
			'price_type'		=>	$this->input->post('price_type'),
		);

		$res = $this->db->insert('pricetype', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*==================================*/
	public function all_PriceType_list()
	{
		$qu = $this->db->get('pricetype');
		$res = $qu->result();
		return $res;
	}

	/*=====================================*/
	public function edit_PriceType($id = null)
	{
		$attr = array('id' =>  $id);
		
		$qu = $this->db->get_where('pricetype', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*=======================================*/
	public function update_PriceType($id = null)
	{

		$attr = array(
			'price_type'		=>	$this->input->post('price_type')
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('pricetype', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}




}