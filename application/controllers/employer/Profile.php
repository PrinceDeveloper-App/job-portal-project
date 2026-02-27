<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->load->model('AuthModel');
		$this->load->model('employer/Profile_model');
		$this->load->database();
	}
	public function index()
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$this->load->helper('url');
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['pageid'] = "profile";
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
			$this->load->view('employer/profilepage', $data);
		} else
			redirect(base_url());
	}

	public function update()
	{

		$_data = $this->input->post();
		$_sdata['email'] = $_data['email'];
		$registerID = $_data['registerID'];
		$_sdata['businessname'] = $_data['businessname'];
		$_sdata['tradename'] = $_data['tradename'];
		$_sdata['phoneNumber'] = $_data['phonenumber'];
		$_sdata['address'] = $_data['address'];
		$_sdata['city'] = $_data['city'];
		$_sdata['province'] = $_data['province'];
		$_sdata['postalcode'] = $_data['postalcode'];
		$_sdata['businesstype'] = $_data['businesstype'];
		$_sdata['registrationnumber'] = $_data['registrationnumber'];
		$today = date("F j, Y");
		$_sdata['last_updated'] = $today;
		$this->Profile_model->update_registration_details($_sdata, $registerID);
		echo "success";
	}
}
