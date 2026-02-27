<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->model('AuthModel');
		$this->load->model('employer/Dashboard_model');
		$this->load->helper(array('cookie', 'url'));
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
			$data['pageid'] = "dashboard";
			$data['logintype'] = $session_user['logintype'];
			$registerid = $session_user['registerid'];
			$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
			$data['total_active_jobs'] = $this->Dashboard_model->get_total_active_jobs($registerid);
			$this->load->view('employer/dashboard', $data);
		} else
			redirect(base_url());
	}

	///////////////////////////Listing Jobs///////////////////////////
	public function getjobs($offset = 0)
	{
		$this->output->set_content_type('application/json');

		//$this->load->model('Job_model');
		$this->load->library('pagination');


		$register_id = $this->input->post('register_id', true);

		$base = base_url();

		$per_page = 5;

		$config['base_url']   = base_url('employer/Dashboard/getjobs/');
		$config['per_page']   = $per_page;
		$config['total_rows'] = $this->Dashboard_model->count_jobs($register_id);
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


		$jobs = $this->Dashboard_model->get_jobs(
			$per_page,
			$offset,
			$register_id
		);
		//echo $this->db->last_query();
		//exit;
		/* -------- Build HTML -------- */
		$html = '';

		if (!empty($jobs)) {
			foreach ($jobs as $job) {
				$newDate = DateTime::createFromFormat('d-m-Y', $job->posted_date)
					->format('M d, Y');
				$total_job_views = $this->Dashboard_model->get_total_job_views($job->job_id);
				$edit_url = base_url('employer/JobManagement/edit/' . $job->job_id);
				$analytics_url = base_url('employer/Analytics/data/' . $job->job_id);
				$html .= '
                                    <tr id="jobRow_' . $job->job_id . '">
                                        <td class="two-line-cell" style="">
										<span class="line-title"><i class="fa-solid fa-briefcase icon-start" style="color: #006233;font-size: 1.5rem;"></i>' . $job->jobtitle . '</span>
										<span class="line-item">' . $job->job_location . '</span>
										<span class="line-item" style="color: #6C757D;">Posted On  ' . $newDate . '</span></td>
                                        <td>';
				if ($job->current_status == "active") {
					$html .= '<span class="activeStatus active" id="activeStatus' . $job->job_id . '">Active</span>';
				} elseif ($job->current_status == "expired") {
					$html .= '<span class="activeStatus expire" id="activeStatus">Expired</span>';
				} elseif ($job->current_status == "paused") {
					$html .= '<span class="activeStatus pause" id="activeStatus' . $job->job_id . '">Paused</span>';
				}
				$html .= '</td>
                                        <td>
										<button class="btn btn-outline-danger btn-sm rounded-pill delete-job-btn"
										data-job-id="' . $job->job_id . '"
										aria-label="Remove favorite">
										<i class="fa-solid fa-trash" aria-hidden="true"></i></button>
										<a href="'.$edit_url.'" class="btn btn-outline-success btn-sm rounded-pill edit-btn"
										data-job-id="' . $job->job_id . '"
										 aria-label="Remove favorite">
										<i class="fa-solid fa-file-pen"></i></a><br>';
				if ($job->current_status == "active" || $job->current_status == "paused") {
					$html .= '<label class="status-switch" aria-label="Toggle open to work">';
					if ($job->current_status == "active") {
						$html .= '<input type="checkbox" 
										 class="job-status-toggle" 
										 data-job-id="' . $job->job_id . '"
										checked="">';
					} else if ($job->current_status == "paused") {
						$html .= '<input type="checkbox" 
										 class="job-status-toggle" 
										 data-job-id="' . $job->job_id . '">';
					}

					$html .= '<span class="status-slider"></span>
										</label>';
				}
				$html .= '</td>
                                        <td>' . $total_job_views . '</td>
                                        <td>
                                            <a
                                                href="'. $analytics_url .'"
                                                class="btn btn-outline-primary"><i class="fa-solid fa-chart-line" aria-hidden="true"></i>&nbsp;&nbsp;Analytics</a>
                                        </td>
                                    </tr>
                                ';
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

	//////////// Update Job Active Status /////////////////////

	public function update_job_status()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$job_id = $this->input->post('job_id');
		$status = $this->input->post('current_status');

		if (!$job_id || !in_array($status, ['active', 'paused'])) {
			echo json_encode(['status' => 'error']);
			exit;
		}

		$this->Dashboard_model->update_job_status($job_id, $status);

		echo json_encode(['status' => 'success']);
		exit;
	}

	////////////////////// Delete Jobs //////////////////////
	public function delete_job()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$job_id = $this->input->post('job_id');

		if (!$job_id) {
			echo json_encode(['status' => 'error']);
			exit;
		}


		if ($this->Dashboard_model->delete_job($job_id)) {
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error']);
		}
		exit;
	}
}
