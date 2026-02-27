<?php
class Postjob_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	////// Location Queries /////////////
	public function get_job_locations($keyword)
	{
		$meta_query = "SELECT * FROM `location_list` WHERE `location_name`  LIKE '%" . $keyword . "%'";
		$meta_query .= "  ORDER BY `location_name` asc";

		$query = $this->db->query($meta_query);
		foreach ($query->result_array() as $row) {
			$data[] = $row;
		}
		return $query;
	}
	function get_job_locations_by_id($id = '')
	{
		$this->db->where('location_id', $id);
		$query = $this->db->get('location_list');
		return $query->result();
	}
	public function insert_location($where_arr = '')
	{
		$query = $this->db->insert('location_list', $where_arr);
	}
	/////////////////// Get Job Categories //////////////////////////
	public function get_category_data()
	{
		$query = $this->db->get(' jb_ca_job_category');
		return $query->result_array();
	}
	public function update_job_post_count($registerid)
	{
		$this->db->set('remaining_jobs_to_post', 'remaining_jobs_to_post - 1', FALSE);
		$this->db->set('total_jobs_posted', 'total_jobs_posted + 1', FALSE);
		$this->db->set(
			'plan_status',
			"CASE 
            WHEN remaining_jobs_to_post - 1 <= 0 THEN 'expired'
            ELSE plan_status
         END",
			FALSE
		);

		$this->db->where('id', $registerid);
		$this->db->where('remaining_jobs_to_post >', 0); // safety check
		return $this->db->update('fb_register_details');
	}
	public function insert_job_details($where_arr = '')
	{
		$query = $this->db->insert('posted_job_details', $where_arr);
	}
	public function get_posted_job_data($id)
	{
		$this->db->where('register_id', $id);
		$query = $this->db->get('posted_job_details');
		return $query->result_array();
	}

	public function get_posted_job_data_by_id($job_id)
	{
		$this->db->where('job_id', $job_id);
		$query = $this->db->get('posted_job_details');
		return $query->result_array();
	}
	public function update_job_details($save_data, $job_id)
	{
		$this->db->where(array('job_id'=>$job_id));
		$query=$this->db->update('posted_job_details',$save_data);
	}
}
