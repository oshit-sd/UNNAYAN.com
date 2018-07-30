<?php

/**
* 
*/
class Area_model extends CI_Model
{

	/*=====================================*/
	public function fatch_city_with_ajax($country)
	{
		$attr = array('country_id' =>  $country);
		$query = $this->db->get_where('tbl_city', $attr);
		$res = $query->result();

		if ($res) {
			return $res;
		}else {
			return FALSE;
		}
	}


	/*=====================================*/
	public function fatch_zone_with_ajax($city)
	{
		$attr = array('city_id' =>  $city);
		$query = $this->db->get_where('tbl_area', $attr);
		$res = $query->result();

		if ($res) {
			return $res;
		}else {
			return FALSE;
		}
	}




	/*===============Insert Country====================*/	
	/*===============Insert Country====================*/	
	/*===============Insert Country====================*/	
	/*===============Insert Country====================*/	
	public function Country_insert()
	{
		$attr = array(
			'country_name'		=>	$this->input->post('country')
		);
		$res = $this->db->insert('tbl_country', $attr);
		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*==============================*/
	public function all_Country_list()
	{
		$qu = $this->db->get('tbl_country');
		$res = $qu->result();
		return $res;
	}

	/*===============================*/
	public function edit_Country($id = null)
	{
		$attr = array('ct_id' =>  $id);
		$qu = $this->db->get_where('tbl_country', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*===========================*/
	public function update_Country($id = null)
	{
		$attr = array(
			'country_name'		=>	$this->input->post('country')
		);

		$this->db->where('ct_id', $id);
		$qu = $this->db->update('tbl_country', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*===================================*/
	public function Country_delete($id = null)
	{
		$qu = $this->db->delete('tbl_country', array('ct_id' => $id ));
		if ( $this->db->affected_rows() == 1) {
			
			return TRUE;
		}else {
			return FALSE;
		}
	}









	/*===============Insert City====================*/	
	/*===============Insert City====================*/	
	/*===============Insert City====================*/	
	/*===============Insert City====================*/	
	public function City_insert()
	{
		$attr = array(
			'country_id'	=>	$this->input->post('country'),
			'city_name'		=>	$this->input->post('city')
		);
		$res = $this->db->insert('tbl_city', $attr);
		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*==============================*/
	public function all_City_list()
	{
		$this->db->select('*');    
		$this->db->from('tbl_city');
		$this->db->join('tbl_country', 'tbl_city.country_id = tbl_country.ct_id');
		$query = $this->db->order_by('tbl_city.city_name','asc')->get();

		$res = $query->result();
		return $res;
	}

	/*===============================*/
	public function edit_City($id = null)
	{
		$this->db->select('*');    
		$this->db->from('tbl_city');
		$this->db->join('tbl_country', 'tbl_city.country_id = tbl_country.ct_id');
		$query = $this->db->where('cty_id', $id)->get();

		if ( $query->num_rows() == 1) {
			return $query->result();
		}else {
			return FALSE;
		}
	}


	/*===========================*/
	public function update_City($id = null)
	{
		$attr = array(
			'country_id'	=>	$this->input->post('country'),
			'city_name'		=>	$this->input->post('city')
		);

		$this->db->where('cty_id', $id);
		$qu = $this->db->update('tbl_city', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*===================================*/
	public function City_delete($id = null)
	{
		$qu = $this->db->delete('tbl_city', array('cty_id' => $id ));
		if ( $this->db->affected_rows() == 1) {
			
			return TRUE;
		}else {
			return FALSE;
		}
	}








	/*===============Insert Zone====================*/	
	/*===============Insert Zone====================*/	
	/*===============Insert Zone====================*/	
	/*===============Insert Zone====================*/	
	public function Area_insert()
	{
		$attr = array(
			'city_id'		=>	$this->input->post('city'),
			'area_name'		=>	$this->input->post('area')
		);
		$res = $this->db->insert('tbl_area', $attr);
		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*==============================*/
	public function all_Area_list()
	{
		$this->db->select('*');    
		$this->db->from('tbl_area');
		$this->db->join('tbl_city', 'tbl_area.city_id = tbl_city.cty_id');
		$query = $this->db->order_by('tbl_area.area_name','asc')->get();

		$res = $query->result();
		return $res;
	}

	/*===============================*/
	public function edit_Area($id = null)
	{
		$this->db->select('*');    
		$this->db->from('tbl_area');
		$this->db->join('tbl_city', 'tbl_area.city_id = tbl_city.cty_id');
		$query = $this->db->where('ar_id', $id)->get();

		if ( $query->num_rows() == 1) {
			return $query->result();
		}else {
			return FALSE;
		}
	}


	/*===========================*/
	public function update_Area($id = null)
	{
		$attr = array(
			'city_id'		=>	$this->input->post('city'),
			'area_name'		=>	$this->input->post('area')
		);

		$this->db->where('ar_id', $id);
		$qu = $this->db->update('tbl_area', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	

	/*===================================*/
	public function Area_delete($id = null)
	{
		$qu = $this->db->delete('tbl_area', array('ar_id' => $id ));
		if ( $this->db->affected_rows() == 1) {
			
			return TRUE;
		}else {
			return FALSE;
		}
	}

}