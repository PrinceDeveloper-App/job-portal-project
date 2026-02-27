<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobManagement extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->load->model('Postjob_model');
		$this->load->model('Job_model');
		$this->load->model('AuthModel');
		$this->load->database();
	}

	public function postajob()
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$this->load->helper('url');
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['pageid'] = "postjob";
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
			$data['categories'] = $this->Postjob_model->get_category_data();
			$jobscount = $data['registerdata'][0]['remaining_jobs_to_post'];
			if ($jobscount == 0) {
				redirect(base_url('pricing-plans'));
			} else {
				$this->load->view('employer/postajob', $data);
			}
		} else
			redirect(base_url());
	}
	public function save()
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$this->load->helper('url');
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['pageid'] = "postjob";
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$_data = $this->input->post();
			//$countries = implode(',', $_data['countries']);
			$save_data['register_id'] = $registerid;
			$save_data['companyname'] = $_data['companyname'];
			$save_data['email'] = $_data['email'];
			$save_data['whatsapp'] = $_data['whatsapp'];
			$save_data['jobtitle'] = $_data['jobtitle'];
			$save_data['jobcategory'] = $_data['jobcategory'];
			$save_data['description'] = $_data['description'];
			$save_data['requirements'] = $_data['requirements'];
			$location = $_data['job_location'];
			$location_tag = $location[0];
			if (is_numeric($location_tag)) {
				$result = $this->Postjob_model->get_job_locations_by_id($location_tag);
				$res = $result[0];
				$p_j_location = $res->location_name;
			} else {
				$sl_data['location_name'] = $location_tag;
				$p_j_location = $location_tag;
				$this->Postjob_model->insert_location($sl_data);
			}
			$save_data['job_location'] = $p_j_location;
			$save_data['salary'] = $_data['salary'];
			$save_data['job_type'] = $_data['job_type'];
			$countries = $_data['countries'];
			$jsonData = json_encode($countries);
			$save_data['countrylist'] = $jsonData;
			$save_data['quickapply'] = $_data['quickapply'];
			$save_data['whatsapp_apply'] = $_data['whatsapp_apply'];
			$save_data['posted_date'] = date("d-m-Y");
			$save_data['current_status'] = "active";
			$this->Postjob_model->update_job_post_count($registerid);
			$save_data['expiry_date'] = date('d-m-Y', strtotime('+30 days'));
			$this->Postjob_model->insert_job_details($save_data);
			redirect(base_url('employer/jobs-listing'));

			//print_r($countries);
			//die();
		} else
			redirect(base_url());
	}

	public function job_locations()
	{
		$keyword = $this->input->post('query');
		$query = $this->Postjob_model->get_job_locations($keyword);
		$list = array();
		$r = array();
		foreach ($query->result() as $row) {
			$r['id'] = $row->location_id;
			$r['name'] = $row->location_name;
			$list[] = $r;
		}
		echo json_encode($list);
	}

	/////////////////// Listing of posted jobs //////////////////////////

	public function listing()
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
			$data['jobdata'] = $this->Postjob_model->get_posted_job_data($registerid);
			$data['categories'] = $this->Postjob_model->get_category_data();
			$data['pageid'] = "jobslisting";
			$this->load->view('employer/jobslisting', $data);
		} else
			redirect(base_url());
	}
	////////////////////////////////////LISTING JOBS////////////////////////////////
	public function getjobs($offset = 0)
	{

		$this->output->set_content_type('application/json');

		$this->load->model('Job_model');
		$this->load->library('pagination');

		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$registerid = $session_user['registerid'];
		}
		$job_title = $this->input->post('job_title', true);
		$category  = $this->input->post('category', true);

		$base = base_url();

		$per_page = 5;

		$config['base_url']   = base_url('employer/JobManagement/getjobs/');
		$config['per_page']   = $per_page;
		$config['total_rows'] = $this->Job_model->count_jobs($job_title, $category, $registerid);
		$config['reuse_query_string'] = TRUE;

		$config['uri_segment'] = 4;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['attributes'] = ['class' => 'page-link'];

		$this->pagination->initialize($config);


		$jobs = $this->Job_model->get_jobs(
			$per_page,
			$offset,
			$registerid,
			$job_title,
			$category
		);
		//echo $this->db->last_query();
		//exit;
		/* -------- Build HTML -------- */
		$countryFlags = [
			'Cameroon'    => 'fi fi-cm',
			'Mauritius'   => 'fi fi-mu',
			'Morocco'     => 'fi fi-ma',
			'Tunisia'     => 'fi fi-tn',
			'Ivory Coast' => 'fi fi-ci'
		];
		$html = '';

		if (!empty($jobs)) {
			foreach ($jobs as $job) {
				$newDate = DateTime::createFromFormat('d-m-Y', $job->posted_date)
					->format('M d, Y');
				$countries = is_string($job->countrylist)
					? json_decode($job->countrylist, true)
					: $job->countrylist;

				if (!is_array($countries)) {
					$countries = explode(',', $job->countrylist);
				}
				$html .= '<div class="job-list-item morocco-border">
             <div class="job-card-status">
                 <span class="job-type fulltime">' . $job->job_type . '</span>
             </div>
             <div class="job-list-main">

                 <div class="job-list-content">
                     <h4><a href="#.">' . $job->jobtitle . '</a></h4>
                     <div class="job-list-meta">
                         <span><i class="fa fa-briefcase" aria-hidden="true"></i>
                             ' . $job->jobcategory . '</span><br>
                         <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                             ' . $job->job_location . '</span>
                         <span class="job-list-posted"><i class="fa fa-calendar" aria-hidden="true"></i>Posted On ' . $newDate . '</span>
                     </div>
                 </div>
             </div>';
				if (!empty($countries)) :
					$html .= '<div
                 class="job-list-footer d-flex justify-content-between align-items-center flex-wrap">';
					foreach ($countries as $country) :
						$country = trim($country);

						if (!isset($countryFlags[$country])) {
							continue; // skip unknown countries
						}

						$flagClass = $countryFlags[$country];
						if ($country == 'Morocco') {
							$html .= '<a href="https://canadaemploimaroc.com/jobs/details/' . $job->job_id . '" class="link-btn" target="_blank">
        <span class="' . $flagClass . '"></span>
        ' . $country . '
      <i class="fa-solid fa-arrow-right"></i></a>';
						} elseif ($country == 'Tunisia') {
							$html .= '<a href="https://canadaemploitunisie.com/jobs/details/' . $job->job_id . '" class="link-btn" target="_blank">
        <span class="' . $flagClass . '"></span>
        ' . $country . '
      <i class="fa-solid fa-arrow-right"></i></a>';
						} elseif ($country == 'Ivory Coast') {
							$html .= '<a href="https://canadaemploici.com/jobs/details/' . $job->job_id . '" class="link-btn" target="_blank">
        <span class="' . $flagClass . '"></span>
        ' . $country . '
      <i class="fa-solid fa-arrow-right"></i></a>';
						} elseif ($country == 'Cameroon') {
							$html .= '<a href="https://canadaemploicameroun.com/jobs/details/' . $job->job_id . '" class="link-btn" target="_blank">
        <span class="' . $flagClass . '"></span>
        ' . $country . '
      <i class="fa-solid fa-arrow-right"></i></a>';
						} elseif ($country == 'Mauritius') {
							$html .= '<a href="https://canadaemploimaurice.com/jobs/details/' . $job->job_id . '" class="link-btn" target="_blank">
        <span class="' . $flagClass . '"></span>
        ' . $country . '
      <i class="fa-solid fa-arrow-right"></i></a>';
						}

					endforeach;
					$html .= '</div>';
				endif;
				$html .= '</div>';
			}
		} else {
			$html = '<p>No jobs found</p>';
		}


		echo json_encode([
			'jobs'       => $html,
			'pagination' => $this->pagination->create_links()
		]);
		exit; // 🔥 VERY IMPORTANT
	}

	//////////////////////// JOB UPDATE SECTION ////////////////////////

	public function edit()
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$job_id = $this->uri->segment(4); // 3rd segment
			$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
			$data['jobdata'] = $this->Postjob_model->get_posted_job_data_by_id($job_id);
			$data['categories'] = $this->Postjob_model->get_category_data();
			$data['pageid'] = "edit";
			$this->load->view('employer/jobedit', $data);
		} else
			redirect(base_url());
	}

	public function update()
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$this->load->helper('url');
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['pageid'] = "postjob";
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$_data = $this->input->post();
			//$countries = implode(',', $_data['countries']);
			//$save_data['register_id'] = $registerid;
			$save_data['companyname'] = $_data['companyname'];
			$save_data['email'] = $_data['email'];
			$job_id = $_data['jobid'];
			$save_data['whatsapp'] = $_data['whatsapp'];
			$save_data['jobtitle'] = $_data['jobtitle'];
			$save_data['jobcategory'] = $_data['jobcategory'];
			$save_data['description'] = $_data['description'];
			$save_data['requirements'] = $_data['requirements'];
			if ($_data['job_location'] != null) {
				$location = $_data['job_location'];
				$location_tag = $location[0];
				if (is_numeric($location_tag)) {
					$result = $this->Postjob_model->get_job_locations_by_id($location_tag);
					$res = $result[0];
					$p_j_location = $res->location_name;
					$save_data['job_location'] = $p_j_location;
				} else {
					$sl_data['location_name'] = $location_tag;
					$p_j_location = $location_tag;
					$this->Postjob_model->insert_location($sl_data);
					$save_data['job_location'] = $p_j_location;
				}
			}

			$save_data['salary'] = $_data['salary'];
			$save_data['job_type'] = $_data['job_type'];
			$countries = $_data['countries'];
			$jsonData = json_encode($countries);
			$save_data['countrylist'] = $jsonData;
			$save_data['quickapply'] = $_data['quickapply'];
			$save_data['whatsapp_apply'] = $_data['whatsapp_apply'];
			$save_data['last_update'] = date("d-m-Y");
			//$save_data['current_status'] = "active";
			//$this->Postjob_model->update_job_post_count($registerid);
			//$save_data['expiry_date'] = date('d-m-Y', strtotime('+30 days'));
			$this->Postjob_model->update_job_details($save_data, $job_id);
			redirect(base_url('employer/dashboard'));

			//print_r($countries);
			//die();
		} else
			redirect(base_url());
	}
}
