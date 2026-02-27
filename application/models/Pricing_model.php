<?php
class Pricing_model extends CI_Model {

public function __construct() 
     {
           parent::__construct(); 
     }

     public function get_pricing_plans(){
        $this->db->where("plan_status", "active");
        $query = $this->db->get("pricing_plans");
        return $query->result_array();
     }
     public function get_pricing_plans_by_id($planid){
        $this->db->where("plan_id", $planid);
        $query = $this->db->get("pricing_plans");
        return $query->result_array();
     }

     public function get_active_pack_data($registerid)
    {
        $this->db->select('plan_status, remaining_jobs_to_post'); // ← only two columns
        $this->db->from('fb_register_details');
        $this->db->where('id', $registerid);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() === 1) {
            return $query->result_array(); // return as array
        }

        return false;
    }

    public function update_registration($packData, $registerid)
    {
        $this->db->where('id', $registerid);
        $this->db->update('fb_register_details', $packData);
    }

    public function insertOrderData($where_arr='')
	{
		$query=$this->db->insert('order_data',$where_arr);
		return $this->db->insert_id();
	}

    public function get_next_invoice_number()
    {
        // Get the last invoice number
        $this->db->select('invoice_number');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('order_data');

        if ($query->num_rows() > 0) {
            $last_invoice = $query->row()->invoice_number; // e.g., INV-00123
            // Extract the numeric part (00123)
            $last_number = (int) substr($last_invoice, 4);
            $next_number = $last_number + 1;
        } else {
            $next_number = 1; // First invoice
        }

        // Format to INV-XXXXX (5 digits)
        $new_invoice = 'INV-' . str_pad($next_number, 5, '0', STR_PAD_LEFT);

        return $new_invoice;
    }

    public function get_registration_details($registerid){
        $this->db->where("id", $registerid);
        $query = $this->db->get("fb_register_details");
        return $query->result_array();
     }
}