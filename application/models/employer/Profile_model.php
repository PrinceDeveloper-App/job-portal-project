<?php
class Profile_model extends CI_Model
{
public function update_registration_details($_sdata, $registerID)
	{
		$this->db->where(array('id'=>$registerID));
		$query=$this->db->update('fb_register_details',$_sdata);
		//return $query;
	}
}