<?php
class Job_model extends CI_Model
{
    public function get_jobs($limit, $offset, $registerid, $title = '', $category = '')
    {
        if (!empty($title)) {
            $this->db->like('jobtitle', $title);
        }

        if (!empty($category)) {
            $this->db->where('jobcategory', $category);
        }

        $this->db->where("JSON_CONTAINS(countrylist, '\"Morocco\"')", NULL, FALSE);
        $this->db->where('register_id', $registerid);
        $this->db->where('current_status', 'active');
        $this->db->limit($limit, $offset);
        $this->db->order_by('job_id', 'DESC');

        return $this->db->get('posted_job_details')->result();
    }

    public function count_jobs($title = '', $category = '', $registerid = '')
    {
        if (!empty($title)) {
            $this->db->like('jobtitle', $title);
        }

        if (!empty($category)) {
            $this->db->where('jobcategory', $category);
        }
        $this->db->where('current_status', 'active');
        $this->db->where('register_id', $registerid);
        return $this->db->count_all_results('posted_job_details');
    }
}
