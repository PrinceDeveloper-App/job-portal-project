<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Applications extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('stripe_lib');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->load->model('employer/Application_model');
		$this->load->model('AuthModel');
		$this->load->database();
	}

	public function index()
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
			$data['applicationdata'] = $this->Application_model->get_application_data($registerid);
			$data['pageid'] = "applications";
			$this->load->view('employer/applications', $data);
		} else
			redirect(base_url());
	}
}
