<?php
class Dashboard_model extends CI_Model
{
    public function get_total_active_jobs($register_id)
    {
        return $this->db
            ->where('register_id', $register_id)
            ->where('current_status', 'active')
            ->count_all_results('posted_job_details');
    }
    public function get_jobs($limit, $offset, $register_id = '')
    {

        if (!empty($register_id)) {
            $this->db->where('register_id', $register_id);
        }

        //$this->db->where("JSON_CONTAINS(countrylist, '\"Morocco\"')", NULL, FALSE);
        //$this->db->where('current_status', 'active');
        $this->db->limit($limit, $offset);
        $this->db->order_by('job_id', 'DESC');

        return $this->db->get('posted_job_details')->result();
    }

    public function count_jobs($register_id = '')
    {

        if (!empty($register_id)) {
            $this->db->where('register_id', $register_id);
        }

        return $this->db->count_all_results('posted_job_details');
    }

    // public function get_total_job_views($job_id)
    // {
    //     $query = $this->db
    //         ->select('total_job_views')
    //         ->where('job_id', $job_id)
    //         ->get('engagement_analytics_table');

    //     return ($query->num_rows() > 0)
    //         ? (int) $query->row()->total_job_views
    //         : 0;
    // }

    public function get_total_job_views($job_id)
    {
        $this->db->select('COALESCE(SUM(total_job_views), 0) AS total_views');
        $this->db->from('engagement_analytics_table');
        $this->db->where('job_id', $job_id);

        $query = $this->db->get();
        return $query->row()->total_views;
    }

    //////////////// Update Job Status //////////////////////
    public function update_job_status($job_id, $status)
    {
        return $this->db
            ->where('job_id', $job_id)
            ->update('posted_job_details', [
                'current_status' => $status
            ]);
    }

    ///////////////// Delete Jobs ////////////////////////

    public function delete_job($job_id)
    {
        return $this->db
            ->where('job_id', $job_id)
            ->delete('posted_job_details');
    }
}
