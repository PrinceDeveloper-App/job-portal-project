<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper(array('cookie', 'url'));
        $this->load->model('AuthModel');
        $this->load->database();
    }

    public function login($enc_id = null)
    {
        $session_user=$this->session->userdata('user');
    	if(isset($session_user['email']) && $session_user['email'] != '')
		{
            redirect(base_url('employer/dashboard'));
        }
        $enc = strtr($enc_id, '-_', '+/');
        $pad = strlen($enc) % 4;
        if ($pad) {
            $enc .= str_repeat('=', 4 - $pad);
        }

        $id = $this->encryption->decrypt($enc);
        if($enc_id != null){
        $data['plan_id'] = $id;
        } else {
            $data['plan_id'] = 0;
        }
        $data['pageid'] = "login";
        $data['sticky_button'] = "sticky";
        $this->load->view('auth/login', $data);
    }
    public function register($enc_id = null)
    {
        $session_user=$this->session->userdata('user');
    	if(isset($session_user['email']) && $session_user['email'] != '')
		{
            redirect(base_url('employer/dashboard'));
        }
        $enc = strtr($enc_id, '-_', '+/');
        $pad = strlen($enc) % 4;
        if ($pad) {
            $enc .= str_repeat('=', 4 - $pad);
        }

        $id = $this->encryption->decrypt($enc);
        if($enc_id != null){
        $data['plan_id'] = $id;
        } else {
            $data['plan_id'] = 0;
        }
        $data['pageid'] = "register";
        $this->load->view('auth/register', $data);
    }

    ////  Registration Process  ////
    public function ajax_checkduplication()
    {
        $email        = $this->input->post('email');
        $resemail     = $this->AuthModel->check_email_duplication($email);
        if (count($resemail) > 0) {
            echo "1";
        }
    }
    public function save()
    {

        $_data = $this->input->post();
        $resemail     = $this->AuthModel->check_email_duplication($_data['email']);
        if (count($resemail) > 0) {
            echo "0";
        } else {
            $_sdata['register_type'] = "Employer";
            $_sdata['email'] = $_data['email'];
            $_sdata['businessname'] = $_data['businessname'];
            $_sdata['tradename'] = $_data['tradename'];
            $_sdata['phoneNumber'] = $_data['phonenumber'];
            $_sdata['address'] = $_data['address'];
            $_sdata['city'] = $_data['city'];
            $_sdata['province'] = $_data['province'];
            $_sdata['postalcode'] = $_data['postalcode'];
            $_sdata['businesstype'] = $_data['businesstype'];
            $_sdata['registrationnumber'] = $_data['registrationnumber'];
            $_sdata['plan_status'] = "blocked";
            $today = date("F j, Y");
            $_sdata['registrationdate'] = $today;
            $_sdata['active_status'] = "active";
            $id_register = $this->AuthModel->insert_registration_details($_sdata);
            $pwdnew = md5($_data['password']);
            $v = md5($id_register);
            $logindet = array("register_id" => $id_register, "login_type" => "Employer", "businessname" => $_data['businessname'], "email" => $_data['email'], "password" => $pwdnew, "activation_key" => $v, "varification_status" => "0");
            $logsuc = $this->AuthModel->insert_employer_login($logindet);
            $employeremail = $_data['email'];
            echo $v;
        }
    }
    public function activation()
    {
        $urlkey   = $this->input->get('data', TRUE);
        $planid = $this->input->get('planid', TRUE);
        //$urlkey	=	$urlkey;
        if (isset($urlkey)) {
            $_act_data['varification_status'] = "1";
            $this->AuthModel->update_activation_details($urlkey, $_act_data);
            $actdetails = $this->AuthModel->get_activation_details($urlkey);
            if (count($actdetails) > 0) {
                $result = $actdetails[0];

                $newdata = array('registerid' => $result->register_id, 'logintype' => $result->login_type, 'name' => $result->businessname, 'email' => $result->email, 'loggedin' => TRUE);
                $this->session->set_userdata('user', $newdata);
                $this->session->set_userdata($newdata);
                //if($jobid!=0 && $result->login_type=="Jobseeker"){}else{}
                if($planid == 0){
                    redirect(base_url('employer/dashboard'));
                } else {
                    redirect(base_url('pricing/checkout/' . $planid));
                }
                
            }
        }
    }

    public function forgotPassword()
    {
        $data['pageid'] = "forgetpwd";
        $this->load->view('auth/forgot_password');
    }
    ///////////// Login Process //////////////
    public function loginvalidation()
    {
        $email    =    $this->input->post('email');
        $pwd    =    $this->input->post('password');
        if (isset($email) && isset($pwd)) {
            $data['email']    =    $email;
            $data['password']    =    md5($pwd);
            $resemail = $this->AuthModel->get_user_by_email($data);
            if (count($resemail) > 0) {
                if (count($resemail) > 0) {
                    $result = $resemail[0];
                }
                $sts = $result->varification_status;
                if ($sts == 1) {
                    $newdata = array('registerid' => $result->register_id, 'logintype' => $result->login_type, 'name' => $result->businessname, 'email' => $result->email, 'loggedin' => TRUE);
                    $this->session->set_userdata('user', $newdata);
                    $this->session->set_userdata($newdata);
                    echo "1";
                } else if ($sts == 0) {
                    echo "0";
                } else if ($sts == 2) {
                    echo "2";
                }
            } else {
                echo "Invalid Username or Password.";
            }
        }
    }
    public function logout()
    {
        // destroy session
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect(base_url('Home'));
    }
}
