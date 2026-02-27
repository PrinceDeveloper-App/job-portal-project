<?php
class Order_history_model extends CI_Model
{
    
    public function get_order_data($registerid){
		$this->db->where('register_id', $registerid);
		$query = $this->db->get('order_data');
		return $query->result_array();
	}
}
