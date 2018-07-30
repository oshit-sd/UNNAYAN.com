<?php

/**
* 
*/
class Subcategory_model extends CI_Model
{

	/*====================================================================*/	
	public function Subcategory_insert()
	{

		$attr = array(
			'category_id'			=>	$this->input->post('category'),
			'sub_category_name'		=>	$this->input->post('subCategory'),
		);

		$res = $this->db->insert('sub_category', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*====================================================================*/
	public function all_Subcategory_list()
	{
		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->join('category', 'sub_category.category_id = category.cat_id');
		$query = $this->db->order_by('sub_category.sub_id','desc')->get();

		$res = $query->result();
		return $res;
	}

	

	/*====================================================================*/
	public function edit_SubCategory($id = null)
	{
		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->join('category', 'sub_category.category_id = category.cat_id');
		$query = $this->db->order_by('sub_category.sub_id','desc')->where('sub_category.sub_id',$id)->get();

		if ( $query->num_rows() == 1) {
			return $query->result();
		}else {
			return FALSE;
		}
	}


	/*====================================================================*/
	public function update_Subcategory($id = null)
	{

		$attr = array(
			'category_id'			=>	$this->input->post('category'),
			'sub_category_name'		=>	$this->input->post('subCategory'),
		);

		$this->db->where('sub_id', $id);
		$qu = $this->db->update('sub_category', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

}