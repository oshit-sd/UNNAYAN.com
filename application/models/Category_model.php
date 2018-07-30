<?php

/**
* 
*/
class Category_model extends CI_Model
{

	/*=====================================*/
	public function fatch_sub_category_with_ajax($cate)
	{
		$attr = array('category_id' =>  $cate);
		$query = $this->db->get_where('sub_category', $attr);
		$res = $query->result();

		if ($res) {
			return $res;
		}else {
			return FALSE;
		}
	}


	/*======================================*/	
	public function category_insert()
	{

		$attr = array(
			'cat_name'		=>	$this->input->post('cate'),
			'details'		=>	$this->input->post('details')
		);

		$res = $this->db->insert('category', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*==================================*/
	public function all_category_list()
	{
		$qu = $this->db->get('category');
		$res = $qu->result();
		return $res;
	}

	/*=====================================*/
	public function edit_category($id = null)
	{
		$attr = array('cat_id' =>  $id);
		
		$qu = $this->db->get_where('category', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*=======================================*/
	public function update_category($id = null)
	{

		$attr = array(
			'cat_name'		=>	$this->input->post('cate'),
			'details'		=>	$this->input->post('details')
		);

		$this->db->where('cat_id', $id);
		$qu = $this->db->update('category', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}






	/*==================Write Details Category====================*/
	/*==================Write Details Category====================*/
	/*==================Write Details Category====================*/

	/*======================================*/	
	public function categoryDetails_insert()
	{
		$attr = array(
			'cd_details'		=>	$this->input->post('details'),
		);
		$res = $this->db->insert('tbl_category_details', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	/*==================================*/
	public function all_category_Details()
	{
		$qu = $this->db->get('tbl_category_details');
		$res = $qu->result();
		return $res;
	}


	/*=======================================*/
	public function update_category_Details($id = null)
	{
		$attr = array(
			'cd_details'		=>	$this->input->post('details')
		);

		$this->db->where('cd_id', $id);
		$qu = $this->db->update('tbl_category_details', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


}