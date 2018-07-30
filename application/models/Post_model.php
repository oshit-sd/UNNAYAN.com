<?php

/**
* 
*/
class Post_model extends CI_Model
{
	/*=======================================================*/	
	public function insert_Post_data()
	{
		$phn =$this->input->post('Ccode').$this->input->post('p_phone');
		$attr = array(
			'p_title'			=>	$this->input->post('p_title'),
			'p_date'			=>	$this->input->post('p_date'),
			'p_category'		=>	$this->input->post('p_category'),
			'p_sub_category'	=>	$this->input->post('p_sub_category'),
			'p_details'			=>	$this->input->post('p_details'),
			'p_city'			=>	$this->input->post('p_area'),
			'p_country'			=>	$this->input->post('p_country'),
			'p_zone'			=>	$this->input->post('p_zone'),
			'p_address'			=>	$this->input->post('p_address'),
			'p_email'			=>	$this->input->post('p_email'),
			'p_phone'			=>	$phn,
			'p_price'			=>	$this->input->post('p_price'),
			'p_price_type'		=>	$this->input->post('p_price_type'),
			'p_pic1'			=>	'0',
			'p_pic2'			=>	'0',
			'p_pic3'			=>	'0',
			'p_pic4'			=>	'0',
			'p_file_upload'		=>	'0',
			'p_status'			=>	'p',
			'p_user_type'		=>	$this->session->userdata('user_type'),
			'p_add_by'			=>	$this->session->userdata('user_id'),
			'p_add_time'		=>	date('Y-m-d h:m:s'),
		);

		$res = $this->db->insert('tbl_post', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}



		/*====================================================================*/	
	public function insert_Post_data_with_image($img,$img2,$img3,$img4,$file)
	{
		$phn =$this->input->post('Ccode').$this->input->post('p_phone');
		$attr = array(
			'p_title'			=>	$this->input->post('p_title'),
			'p_date'			=>	$this->input->post('p_date'),
			'p_category'		=>	$this->input->post('p_category'),
			'p_sub_category'	=>	$this->input->post('p_sub_category'),
			'p_details'			=>	$this->input->post('p_details'),
			'p_city'			=>	$this->input->post('p_area'),
			'p_country'			=>	$this->input->post('p_country'),
			'p_zone'			=>	$this->input->post('p_zone'),
			'p_address'			=>	$this->input->post('p_address'),
			'p_email'			=>	$this->input->post('p_email'),
			'p_phone'			=>	$phn,
			'p_price'			=>	$this->input->post('p_price'),
			'p_price_type'		=>	$this->input->post('p_price_type'),
			'p_pic1'			=>	$img,
			'p_pic2'			=>	$img2,
			'p_pic3'			=>	$img3,
			'p_pic4'			=>	$img4,
			'p_file_upload'		=>	$file,
			'p_status'			=>	'p',
			'p_user_type'		=>	$this->session->userdata('user_type'),
			'p_add_by'			=>	$this->session->userdata('user_id'),
			'p_add_time'		=>	date('Y-m-d h:m:s'),
		);

		$res = $this->db->insert('tbl_post', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}



	/*========================================*/
	public function fatch_all_user_post()
	{
		$this->db->select('*');    
		$this->db->from('tbl_post');
		$this->db->join('tbl_users', 'tbl_post.p_add_by = tbl_users.user_id');
		$this->db->join('category', 'tbl_post.p_category = category.cat_id');
		$this->db->join('sub_category', 'sub_category.sub_id = tbl_post.p_sub_category', 'left');
		$this->db->join('tbl_country', 'tbl_country.ct_id = tbl_post.p_country', 'left');
		$this->db->join('tbl_city', 'tbl_city.cty_id = tbl_post.p_city', 'left');
		$this->db->join('tbl_area', 'tbl_area.ar_id = tbl_post.p_zone', 'left');

		$query = $this->db->order_by('tbl_post.post_id','desc')->get();

		$res = $query->result();
		return $res;
	}

	


	/*=====================================*/
	public function approve_post_product($id)
	{
		$attr = array(
			'p_status'			=>	'a',
		);

		$this->db->where('post_id', $id);
		$qu = $this->db->update('tbl_post', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}





	/*========================================*/
	public function fatch_logged_user_info()
	{
		$id = $this->session->userdata('user_id');
		$attr = array('user_id' =>  $id);
		$query = $this->db->get_where('tbl_users', $attr);
		
		$res = $query->result();
		return $res;
	}



	/*======================================*/
	public function fatch_Single_Post($id = null)
	{
		$this->db->select('*');    
		$this->db->from('tbl_post');
		$this->db->join('tbl_users', 'tbl_post.p_add_by = tbl_users.user_id');
		$this->db->join('category', 'tbl_post.p_category = category.cat_id');
		$this->db->join('sub_category', 'sub_category.sub_id = tbl_post.p_sub_category', 'left');
		$this->db->join('tbl_country', 'tbl_country.ct_id = tbl_post.p_country', 'left');
		$this->db->join('tbl_city', 'tbl_city.cty_id = tbl_post.p_city', 'left');
		$this->db->join('tbl_area', 'tbl_area.ar_id = tbl_post.p_zone', 'left');

		$qu = $this->db->where('tbl_post.post_id',$id)->get();

		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}




	/*===========================================*/
	public function edit_user_Product($id)
	{
		$this->db->select('*');    
		$this->db->from('tbl_post');
		$this->db->join('tbl_users', 'tbl_post.p_add_by = tbl_users.user_id');
		$this->db->join('category', 'tbl_post.p_category = category.cat_id');
		$this->db->join('sub_category', 'sub_category.sub_id = tbl_post.p_sub_category', 'left');
		$this->db->join('tbl_country', 'tbl_country.ct_id = tbl_post.p_country', 'left');
		$this->db->join('tbl_city', 'tbl_city.cty_id = tbl_post.p_city', 'left');
		$this->db->join('tbl_area', 'tbl_area.ar_id = tbl_post.p_zone', 'left');

		$query = $this->db->where('tbl_post.post_id',$id)->get();

		$res = $query->result();
		return $res;
	}


	/*=====================================*/
	public function update_post_product( $id)
	{
		$phn =$this->input->post('Ccode').$this->input->post('p_phone');
		$attr = array(
			'p_title'			=>	$this->input->post('p_title'),
			'p_date'			=>	$this->input->post('p_date'),
			'p_category'		=>	$this->input->post('p_category'),
			'p_sub_category'	=>	$this->input->post('p_sub_category'),
			'p_details'			=>	$this->input->post('p_details'),
			'p_city'			=>	$this->input->post('p_area'),
			'p_country'			=>	$this->input->post('p_country'),
			'p_zone'			=>	$this->input->post('p_zone'),
			'p_address'			=>	$this->input->post('p_address'),
			'p_email'			=>	$this->input->post('p_email'),
			'p_phone'			=>	$phn,
			'p_price'			=>	$this->input->post('p_price'),
			'p_price_type'		=>	$this->input->post('p_price_type'),	
		);

		$this->db->where('post_id', $id);
		$qu = $this->db->update('tbl_post', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*====================================================================*/
	public function update_post_product_with_image($img,$img2,$img3,$img4, $id)
	{
		$phn =$this->input->post('Ccode').$this->input->post('p_phone');
		if(empty($img) && empty($img2)  && empty($img3)){
			$attr = array(
			'p_title'			=>	$this->input->post('p_title'),
			'p_date'			=>	$this->input->post('p_date'),
			'p_category'		=>	$this->input->post('p_category'),
			'p_sub_category'	=>	$this->input->post('p_sub_category'),
			'p_details'			=>	$this->input->post('p_details'),
			'p_city'			=>	$this->input->post('p_area'),
			'p_country'			=>	$this->input->post('p_country'),
			'p_zone'			=>	$this->input->post('p_zone'),
			'p_address'			=>	$this->input->post('p_address'),
			'p_email'			=>	$this->input->post('p_email'),
			'p_phone'			=>	$phn,
			'p_price'			=>	$this->input->post('p_price'),
			'p_price_type'		=>	$this->input->post('p_price_type'),
			'p_pic4'			=>	$img4,
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}

		elseif(empty($img) && empty($img4)  && empty($img2)){
		 // echo "no i am"; exit();
			$attr2 = array(
				'p_title'			=>	$this->input->post('p_title'),
				'p_date'			=>	$this->input->post('p_date'),
				'p_category'		=>	$this->input->post('p_category'),
				'p_sub_category'	=>	$this->input->post('p_sub_category'),
				'p_details'			=>	$this->input->post('p_details'),
				'p_city'			=>	$this->input->post('p_area'),
				'p_country'			=>	$this->input->post('p_country'),
				'p_zone'			=>	$this->input->post('p_zone'),
				'p_address'			=>	$this->input->post('p_address'),
				'p_email'			=>	$this->input->post('p_email'),
				'p_phone'			=>	$phn,
				'p_price'			=>	$this->input->post('p_price'),
				'p_price_type'		=>	$this->input->post('p_price_type'),
				'p_pic3'			=>	$img3,	
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr2);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}


		elseif(empty($img) && empty($img4)  && empty($img3)){
		 // echo "no i am"; exit();
			$attr2 = array(
				'p_title'			=>	$this->input->post('p_title'),
				'p_date'			=>	$this->input->post('p_date'),
				'p_category'		=>	$this->input->post('p_category'),
				'p_sub_category'	=>	$this->input->post('p_sub_category'),
				'p_details'			=>	$this->input->post('p_details'),
				'p_city'			=>	$this->input->post('p_area'),
				'p_country'			=>	$this->input->post('p_country'),
				'p_zone'			=>	$this->input->post('p_zone'),
				'p_address'			=>	$this->input->post('p_address'),
				'p_email'			=>	$this->input->post('p_email'),
				'p_phone'			=>	$phn,
				'p_price'			=>	$this->input->post('p_price'),
				'p_price_type'		=>	$this->input->post('p_price_type'),
				'p_pic2'			=>	$img2,	
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr2);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}


		elseif(empty($img2) && empty($img3) && empty($img4) ){
		 // echo "no i am"; exit();
			$attr2 = array(
				'p_title'			=>	$this->input->post('p_title'),
				'p_date'			=>	$this->input->post('p_date'),
				'p_category'		=>	$this->input->post('p_category'),
				'p_sub_category'	=>	$this->input->post('p_sub_category'),
				'p_details'			=>	$this->input->post('p_details'),
				'p_city'			=>	$this->input->post('p_area'),
				'p_country'			=>	$this->input->post('p_country'),
				'p_zone'			=>	$this->input->post('p_zone'),
				'p_address'			=>	$this->input->post('p_address'),
				'p_email'			=>	$this->input->post('p_email'),
				'p_phone'			=>	$phn,
				'p_price'			=>	$this->input->post('p_price'),
				'p_price_type'		=>	$this->input->post('p_price_type'),
				'p_pic1'			=>	$img,	
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr2);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}


		elseif(empty($img) && empty($img2)){
			// echo "no"; exit();
			$attr1 = array( 
				'p_title'			=>	$this->input->post('p_title'),
				'p_date'			=>	$this->input->post('p_date'),
				'p_category'		=>	$this->input->post('p_category'),
				'p_sub_category'	=>	$this->input->post('p_sub_category'),
				'p_details'			=>	$this->input->post('p_details'),
				'p_city'			=>	$this->input->post('p_area'),
				'p_country'			=>	$this->input->post('p_country'),
				'p_zone'			=>	$this->input->post('p_zone'),
				'p_address'			=>	$this->input->post('p_address'),
				'p_email'			=>	$this->input->post('p_email'),
				'p_phone'			=>	$phn,
				'p_price'			=>	$this->input->post('p_price'),
				'p_price_type'		=>	$this->input->post('p_price_type'),
				'p_pic3'			=>	$img3,
				'p_pic4'			=>	$img4,
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr1);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}		


		elseif(empty($img3) && empty($img4)){
			// echo "no"; exit();
			$attr1 = array( 
				'p_title'			=>	$this->input->post('p_title'),
				'p_date'			=>	$this->input->post('p_date'),
				'p_category'		=>	$this->input->post('p_category'),
				'p_sub_category'	=>	$this->input->post('p_sub_category'),
				'p_details'			=>	$this->input->post('p_details'),
				'p_city'			=>	$this->input->post('p_area'),
				'p_country'			=>	$this->input->post('p_country'),
				'p_zone'			=>	$this->input->post('p_zone'),
				'p_address'			=>	$this->input->post('p_address'),
				'p_email'			=>	$this->input->post('p_email'),
				'p_phone'			=>	$phn,
				'p_price'			=>	$this->input->post('p_price'),
				'p_price_type'		=>	$this->input->post('p_price_type'),
				'p_pic1'			=>	$img,
				'p_pic2'			=>	$img2,
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr1);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}
		
		elseif(empty($img4) && empty($img2)){
			// echo "no"; exit();
			$attr1 = array( 
				'p_title'			=>	$this->input->post('p_title'),
				'p_date'			=>	$this->input->post('p_date'),
				'p_category'		=>	$this->input->post('p_category'),
				'p_sub_category'	=>	$this->input->post('p_sub_category'),
				'p_details'			=>	$this->input->post('p_details'),
				'p_city'			=>	$this->input->post('p_area'),
				'p_country'			=>	$this->input->post('p_country'),
				'p_zone'			=>	$this->input->post('p_zone'),
				'p_address'			=>	$this->input->post('p_address'),
				'p_email'			=>	$this->input->post('p_email'),
				'p_phone'			=>	$phn,
				'p_price'			=>	$this->input->post('p_price'),
				'p_price_type'		=>	$this->input->post('p_price_type'),
				'p_pic1'			=>	$img,
				'p_pic3'			=>	$img3,
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr1);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}
		
		elseif(empty($img1)){
		 // echo "no i am"; exit();
			$attr2 = array(
				'p_title'			=>	$this->input->post('p_title'),
				'p_date'			=>	$this->input->post('p_date'),
				'p_category'		=>	$this->input->post('p_category'),
				'p_sub_category'	=>	$this->input->post('p_sub_category'),
				'p_details'			=>	$this->input->post('p_details'),
				'p_city'			=>	$this->input->post('p_area'),
				'p_country'			=>	$this->input->post('p_country'),
				'p_zone'			=>	$this->input->post('p_zone'),
				'p_address'			=>	$this->input->post('p_address'),
				'p_email'			=>	$this->input->post('p_email'),
				'p_phone'			=>	$phn,
				'p_price'			=>	$this->input->post('p_price'),
				'p_price_type'		=>	$this->input->post('p_price_type'),
				'p_pic2'			=>	$img2,
				'p_pic3'			=>	$img3,
				'p_pic4'			=>	$img4,
			);

			$this->db->where('post_id', $id);
			$qu = $this->db->update('tbl_post', $attr2);
			
			if ( $this->db->affected_rows()) {
				return TRUE;
			}else {
				return FALSE;
			}
		}
	}



	/*=====================================*/
	public function Post_delete($id = null)
	{
		$attr = array(
			'p_status' 		=> 'd'
		);
		
		$this->db->where('post_id', $id);
		$qu = $this->db->update('tbl_post', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*===========================================*/
	public function fatch_user_category_products($cateID=null)
	{
		$attr = array('p_category' =>  $cateID);
		$query = $this->db->get_where('tbl_post', $attr);
		
		$res = $query->result();
		return $res;
	}


	/*===========================================*/
	public function fatch_user_sub_category_products($subID=null)
	{
		$attr = array('p_sub_category' =>  $subID);
		$query = $this->db->get_where('tbl_post', $attr);
		
		$res = $query->result();
		return $res;
	}


	/*===========================================*/
	public function fatch_user_City_product($city=null)
	{
		$attr = array('p_city' =>  $city);
		$query = $this->db->get_where('tbl_post', $attr);
		
		$res = $query->result();
		return $res;
	}



	/*===========================================*/
	public function fatch_Category_product($cate=null,$uType=null)
	{	
		if($uType == 's'): 
			$cType  = 'b';
		else:
			$cType  = 's';
		endif;

		$attr = array('p_category' =>  $cate, 'p_user_type' =>  $cType);
		$query = $this->db->get_where('tbl_post', $attr);
		
		$res = $query->result();
		return $res;
	}

	/*===========================================*/
	public function fatch_related_product($cate=null)
	{	
		$attr = array('p_category' =>  $cate);
		$query = $this->db->get_where('tbl_post', $attr);
		
		$res = $query->result();
		return $res;
	}


	/*===========================================*/
	public function fatch_sub_Category_product($sub=null,$uType=null)
	{
		if($uType == 's'): 
			$cType  = 'b';
		else:
			$cType  = 's';
		endif;

		$attr = array('p_sub_category' =>  $sub, 'p_user_type' =>  $cType);
		$query = $this->db->get_where('tbl_post', $attr);
		
		$res = $query->result();
		return $res;
	}



	/*===========================================*/
	public function fatch_City_product($city=null, $uType=null)
	{
		if($uType == 's'): 
			$cType  = 'b';
		else:
			$cType  = 's';
		endif;
		
		$attr = array('p_city' =>  $city, 'p_user_type' =>  $cType);
		$query = $this->db->get_where('tbl_post', $attr);

		$res = $query->result();
		return $res;
	}


	/*===========================================*/
	public function fatch_Zone_product($zone=null, $uType=null)
	{
		if($uType == 's'): 
			$cType  = 'b';
		else:
			$cType  = 's';
		endif;
		
		$attr = array('p_zone' =>  $zone, 'p_user_type' =>  $cType);
		$query = $this->db->get_where('tbl_post', $attr);

		$res = $query->result();
		return $res;
	}





	/*=========================================*/
	public function view_product($id=null)
	{
		$this->db->select('*');    
		$this->db->from('tbl_post');
		$this->db->join('tbl_users', 'tbl_post.p_add_by = tbl_users.user_id');
		$this->db->join('category', 'tbl_post.p_category = category.cat_id');
		$this->db->join('sub_category', 'sub_category.sub_id = tbl_post.p_sub_category', 'left');
		$this->db->join('tbl_country', 'tbl_country.ct_id = tbl_post.p_country', 'left');
		$this->db->join('tbl_city', 'tbl_city.cty_id = tbl_post.p_city', 'left');
		$this->db->join('tbl_area', 'tbl_area.ar_id = tbl_post.p_zone', 'left');

		$query = $this->db->where('tbl_post.post_id',$id)->limit(1)->get();

		$res = $query->result();
		return $res;
	}





	/*=====Without Access Category Search======*/
	/*=====Without Access Category Search======*/
	public function WAsearch_products($id=null)
	{
		$country 	= $this->input->post('p_country');
		$city 		= $this->input->post('p_area');
		$zone 		= $this->input->post('p_zone');


		if($id != 0){
			if(empty($city) && empty($zone)):
				$attr = array('p_country' =>  $country, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				// echo "<pre>";
				// print_r($res); exit();
				return $res;

			elseif(empty($zone)):
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			elseif(isset($country) && isset($city) && isset($zone)):  
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			else:
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;
			endif;

		}
		else{
			
			if(empty($city) && empty($zone)):
				$attr = array('p_country' =>  $country);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				// echo "<pre>";
				// print_r($res); exit();
				return $res;

			elseif(empty($zone)):
				$attr = array('p_country' =>  $country, 'p_city' =>  $city);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			elseif(isset($country) && isset($city) && isset($zone)):  
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			else:
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;
			endif;
		}
	}







	/*===================================*/
	public function search_products($id=null)
	{
		$country 	= $this->input->post('p_country');
		$city 		= $this->input->post('p_area');
		$zone 		= $this->input->post('p_zone');

		if($id != 0){

			if(empty($city) && empty($zone)):
				$attr = array('p_country' =>  $country, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				// echo "<pre>";
				// print_r($res); exit();
				return $res;

			elseif(empty($zone)):
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			elseif(isset($country) && isset($city) && isset($zone)):  
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			else:
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone, 'p_category' =>  $id);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;
			endif;
		}
		else{
			
			if(empty($city) && empty($zone)):
				$attr = array('p_country' =>  $country);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				// echo "<pre>";
				// print_r($res); exit();
				return $res;

			elseif(empty($zone)):
				$attr = array('p_country' =>  $country, 'p_city' =>  $city);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			elseif(isset($country) && isset($city) && isset($zone)):  
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;

			else:
				$attr = array('p_country' =>  $country, 'p_city' =>  $city, 'p_zone' =>  $zone);
				$query = $this->db->get_where('tbl_post', $attr);

				$res = $query->result();
				return $res;
			endif;
		}
	}


}