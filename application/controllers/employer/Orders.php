<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Orders extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('stripe_lib');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->load->model('employer/Order_history_model');
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
			$data['orderdata'] = $this->Order_history_model->get_order_data($registerid);
			$data['pageid'] = "orders";
			$this->load->view('employer/order_history', $data);
		} else
			redirect(base_url());
	}
}
