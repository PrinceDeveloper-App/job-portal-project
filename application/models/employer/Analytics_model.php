<?php
class Analytics_model extends CI_Model
{
    public function get_job_engagement_totals($job_id)
    {
        $this->db->select('
        COALESCE(SUM(total_job_views), 0)        AS total_job_views,
        COALESCE(SUM(quick_apply_count), 0)     AS quick_apply_count,
        COALESCE(SUM(whatsapp_apply_count), 0)  AS whatsapp_apply_count,
        COALESCE(SUM(total_applicants), 0)      AS total_applicants
    ');
        $this->db->from('engagement_analytics_table');
        $this->db->where('job_id', $job_id);
        return $this->db->get()->row();
    }
    public function get_analytics_data($job_id){
		$this->db->where('job_id', $job_id);
		$query = $this->db->get('engagement_analytics_table');
		return $query->result_array();
	}
}
