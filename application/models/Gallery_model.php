<?php

/**
* 
*/
class Gallery_model extends CI_Model
{
	/*====================================================================*/	
	public function add_gallery($file_name)
	{
		$attr = array(
			'title'		=>	$this->input->post('title'),
			'pic'		=>	$file_name,
		);

		$res = $this->db->insert('gallery', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	
	/*====================================================================*/
	public function all_gallery_list()
	{
		$qu = $this->db->order_by('id','desc')->get('gallery');
		$res = $qu->result();
		return $res;
	}

	
	/*====================================================================*/
	public function gallery_image_for_home()
	{
		$qu = $this->db->order_by('id','desc')->limit(4)->get('gallery');
		$res = $qu->result();
		return $res;
	}


	/*====================================================================*/
	public function edit_gallery($id = null)
	{
		$attr = array('id' =>  $id);
		
		$qu = $this->db->get_where('gallery', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->result();
		}else {
			return FALSE;
		}
	}


	/*====================================================================*/
	public function update_gallery($file_name, $id)
	{

		$attr = array(
			'title'		=>	$this->input->post('title'),
			'pic'		=>	$file_name,
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('gallery', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*====================================================================*/
	public function Gallery_delete($id = null)
	{
		$qu = $this->db->delete('gallery', array('id' => $id ));
		if ( $this->db->affected_rows() == 1) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}