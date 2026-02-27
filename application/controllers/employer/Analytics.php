<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytics extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->load->model('employer/Analytics_model');
		$this->load->model('AuthModel');
        $this->load->model('Postjob_model');
		$this->load->database();
	}
    public function data()
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$this->load->helper('url');
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['pageid'] = "dashboard";
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
            $job_id = $this->uri->segment(4); // 3rd segment
			$data['engagement'] = $this->Analytics_model->get_job_engagement_totals($job_id);
            $data['jobdata'] = $this->Postjob_model->get_posted_job_data_by_id($job_id);
            $data['analyticsdata'] = $this->Analytics_model->get_analytics_data($job_id);
			$this->load->view('employer/analytics', $data);
		} else
			redirect(base_url());
	}
}