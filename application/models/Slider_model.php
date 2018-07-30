<?php

/**
* 
*/
class Slider_model extends CI_Model
{
	
	public function image_insert($file_name)
	{

		$attr = array(
			'pic'		=>	$file_name,
		);

		$res = $this->db->insert('slider', $attr);

		if($res)
		{
			return TRUE;
		}
		else{
			redirect('add_slideImage');
		}
	}

	public function all_slider_list()
	{
		$qu = $this->db->order_by('id','desc')->get('slider');
		$res = $qu->result();
		return $res;
	}

	public function slider_delete($id = null)
	{
		$qu = $this->db->delete('slider', array('id' => $id ));
		if ( $this->db->affected_rows() == 1) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}