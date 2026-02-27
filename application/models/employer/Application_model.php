<?php
class Application_model extends CI_Model
{
    
    public function get_application_data($registerid){
		$this->db->where('employer_id', $registerid);
		$query = $this->db->get('applications');
		return $query->result_array();
	}
}
