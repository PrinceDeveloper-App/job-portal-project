<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {
      function __construct(){
			parent::__construct();	
			$this->load->helper('url');	
			$this->load->helper('form');
			 $this->load->model('AuthModel');
			$this->load->helper(array('cookie', 'url'));
	  }
	
	public function index()
	{
		$session_user=$this->session->userdata('user');
    	if(isset($session_user['email']) && $session_user['email'] != '')
		{
		$this->load->helper('url');
		$data['name']=$session_user['name'];
		$data['registerid']=$session_user['registerid'];
		$data['email']=$session_user['email'];
		$data['loggedin']=$session_user['loggedin'];
		$data['logintype']=$session_user['logintype'];
		$registerid = $session_user['registerid'];
		$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
		}
		$data['pageid']="about";
		$data['sticky_button'] = "sticky";
		$this->load->view('aboutuspage',$data); 
		
		
	}
}