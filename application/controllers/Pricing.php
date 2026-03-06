<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pricing extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('stripe_lib');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
		$this->load->model('Pricing_model');
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
		}
		$data['planlist'] = $this->Pricing_model->get_pricing_plans();
		$data['pageid'] = "pricing";
		$this->load->view('pricing/pricing_plans', $data);
	}
	public function checkout($planid = null)
	{
		$session_user = $this->session->userdata('user');
		if (isset($session_user['email']) && $session_user['email'] != '') {
			$data['name'] = $session_user['name'];
			$data['registerid'] = $session_user['registerid'];
			$data['email'] = $session_user['email'];
			$data['loggedin'] = $session_user['loggedin'];
			$data['logintype'] = $session_user['logintype'];
			// If plain numeric ID
			if (ctype_digit((string)$planid)) {
				$planid = (int)$planid;
			}

			// Try decrypting
			$enc = strtr($planid, '-_', '+/');
			$pad = strlen($enc) % 4;
			if ($pad) {
				$enc .= str_repeat('=', 4 - $pad);
			}

			$id = $this->encryption->decrypt($enc);

			// Check decrypted result
			if ($id !== FALSE && ctype_digit((string)$id)) {
				$planid = (int)$id;
			}
			$registerid = $session_user['registerid'];
			$data['registerdata'] = $this->AuthModel->get_registration_data($registerid);
			$data['plandetails'] = $this->Pricing_model->get_pricing_plans_by_id($planid);
			$activePackData = $this->Pricing_model->get_active_pack_data($registerid);
			if ($activePackData === false) {
				show_404();
			}

			$data['packData'] = $activePackData;

			$data['pageid'] = "pricing";
			$this->load->view('pricing/checkoutpage', $data);
		} else
			redirect(base_url());
	}

	////////////////////// PRICING SECTION ////////////////////////////////

	public function payment()
	{
		$postData = $this->input->post();
		$payment_method = $postData['payment_method'];
		// If post data is not empty 
		if ($payment_method) {
			$token  = $postData['payment_method'];
			$registerid = $postData['registerid'];
			$planid = $postData['planid'];
			$planname = $postData['planname'];
			$jobstopost = $postData['jobstopost'];
			$email = $postData['email'];
			$postingduration = $postData['postingduration'];
			$price = $postData['price'];
			$currentjobpostcount = $postData['currentjobpostcount'];
			$totaljobstopost = $jobstopost + $currentjobpostcount;
			\Stripe\Stripe::setApiKey("KEY");

			$customer = \Stripe\Customer::create([
				'email' => $email,
				//'payment_method' => $payment_method,
			]);
			//$customer = $this->stripe_lib->addCustomer($email, $token);
			if ($customer) {

				\Stripe\Stripe::setApiKey("KEY");
				//$amount = 100;
				$amount = $price * 100; // 1000
				//$itemPriceCents = ($amount * 100);
				try {

					// 3. Create PaymentIntent
					$paymentIntent = \Stripe\PaymentIntent::create([
						'amount' => $amount,
						'currency' => 'cad',
						'customer' => $customer->id,
						'payment_method' => $payment_method,
						'confirm' => true,
						// IMPORTANT FIX
						'automatic_payment_methods' => [
							'enabled' => true,
							'allow_redirects' => 'never'
						]
					]);

					// Transaction details  

					$plan_status = "active";
					$packData = array(
						'plan_id' => $planid,
						'jobs_to_post' => $jobstopost,
						'posting_duration' => $postingduration,
						'remaining_jobs_to_post' => $totaljobstopost,
						'plan_status' => $plan_status

					);
					$this->Pricing_model->update_registration($packData, $registerid);
					$invoice_no = $this->Pricing_model->get_next_invoice_number();
                    $date = date('d-m-Y');
					$orderData = array(
						'register_id' => $registerid,
						'plan_id' => $planid,
						'plan_name' => $planname,
						'plan_amount' => $amount,
						'total_paid_amount' => $amount,
						'invoice_number' => $invoice_no,
						'payment_date' => $date
					);
					$order_id = $this->Pricing_model->insertOrderData($orderData);

					$customerData = $this->Pricing_model->get_registration_details($registerid);
					foreach ($customerData as $data) {
						$businessname = $data['businessname'];
						$address = $data['address'];
					}
					$this->send_email($email, $planname, $amount, $businessname, $address, $jobstopost, $invoice_no, $order_id);


					echo "success";
				} catch (\Exception $e) {
					echo "fail";
				}
			}
		}
		//return false;
	}

	public function send_email($email, $planname, $amount, $businessname, $address, $jobstopost, $invoice_no, $order_id)
	{

		//$invoice_no = $this->Invoice_model->get_next_invoice_number();

		// 2️⃣ Prepare invoice data
		$invoiceData = [
			'invoice_no' => $invoice_no,
			'planname' => $planname,
			'amount' => $amount,
			'businessname' => $businessname,
			'address' => $address,
			'jobstopost' => $jobstopost,
			'email' => $email,
			'date' => date('d-m-Y')
		];

		// 3️⃣ Generate HTML for invoice
		$html = $this->load->view('invoice_template', $invoiceData, TRUE);

		// 4️⃣ Generate PDF using Dompdf
		require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
		$options = new Options();
		$options->set('isRemoteEnabled', TRUE);
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();

		// Save PDF to a temporary location
		$filename = 'invoice_' . time() . '.pdf';
		$pdf_path = FCPATH . 'uploads/' . $filename;
		//$pdf_path = FCPATH . 'uploads/invoice_' . time() . '.pdf';
		file_put_contents($pdf_path, $dompdf->output());

		$data = [
			'invoice_pdf' => $filename
		];

		$this->db->where('id', $order_id);
		$this->db->update('order_data', $data);


		// Email configuration

		$config = array(
			'protocol' => "smtp",
			'smtp_crypto' => "ssl",
			'email_smtp_crypto' => "ssl",
			'newline' 	=> "\r\n",
			'priority' 	=> 1,
			'smtp_host' => "mail.francobridge.ca",
			'smtp_port' => 465,
			'smtp_user' => "admin@francobridge.ca",
			'smtp_pass' => "",
			'mailtype'  => "html",
			'charset'   => "iso-8859-1"
		);
		$this->load->library('email', $config);
		$this->email->from('admin@francobridge.ca', 'Francobridge Canada');
		$this->email->set_mailtype("html");
		$this->email->to($email);
		$this->email->subject('Francobridge Canada Invoice');
		//$message = file_get_contents(FCPATH . 'email_templates/consultation_confirm.html');
		$message = $this->confirmation_email_message();
		$this->email->message($message);
		$this->email->attach($pdf_path);
		$this->email->send();
	}

	public function confirmation_email_message()
	{

		$year = date('Y');

		$message = '
		<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Francobridge Payment Confirmation</title>
    <style>
      body {
        font-family: "Arial", sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
      }
      .email-container {
        max-width: 600px;
        margin: 30px auto;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
      }
      .header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
        color: #000;
        text-align: center;
        padding: 20px;
        font-size: 22px;
        font-weight: bold;
      }
      .content {
        padding: 25px;
        color: #333333;
        line-height: 1.6;
        font-size: 16px;
      }
      .content h3 {
        color: #0d6efd;
        margin-bottom: 10px;
      }
      .details {
        background-color: #f8f9fa;
        border: 1px solid #e0e0e0;
        padding: 15px;
        border-radius: 5px;
        margin-top: 10px;
      }
      .details p {
        margin: 5px 0;
      }
      .note {
        font-size: 14px;
        color: #666666;
        margin-top: 15px;
        border-left: 3px solid #000;
        padding-left: 10px;
      }
      .footer {
        text-align: center;
        font-size: 14px;
        color: #999999;
        padding: 15px;
        border-top: 1px solid #eeeeee;
      }
    </style>
  </head>
  <body>
    <div class="email-container">
      <div class="header">Payment Confirmed</div>

      <div class="content">
        <p>Thank you — your <strong>pricing plan</strong> is activated now.</p>
        <p>Explore the features of francobridge. Publishing job opportunities across five francophone countries. </p>

        <div class="details">
          <p>The payment invoice is attached with the email</p>
        </div>
      </div>

      <div class="footer">
        © <span id="year">' . $year . '</span> <a href="https://francobridge.ca/">FRANCOBRIDGE</a>. All
        rights reserved.
      </div>
    </div>
  </body>
</html>';

		return $message;
	}
	public function success_message()
	{
		$data['pageid'] = "booking";
		$data['breadcrumb'] = "Suceess";
		$data['pagename'] = "Success Message";
		$data['success_message'] = "success";
		$this->load->view('pricing/paymentSuccess', $data);
	}
	public function fail_message()
	{
		$data['pageid'] = "booking";
		$data['breadcrumb'] = "Failed";
		$data['pagename'] = "Failure Message";
		$data['fail_message'] = "fail";
		$this->load->view('pricing/paymentFail', $data);
	}
}
