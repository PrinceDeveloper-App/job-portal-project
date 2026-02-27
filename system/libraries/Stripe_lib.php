<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 * Stripe Library for CodeIgniter 3.x 
 * 
 * Library for Stripe payment gateway. It helps to integrate Stripe payment gateway 
 * in CodeIgniter application. 
 * 
 * This library requires the Stripe PHP bindings and it should be placed in the third_party folder. 
 * It also requires Stripe API configuration file and it should be placed in the config directory. 
 * 
 * @package     CodeIgniter 
 * @category    Libraries 
 * @author      CodexWorld 
 * @license     http://www.codexworld.com/license/ 
 * @link        http://www.codexworld.com 
 * @version     3.0 
 */

class CI_Stripe_lib
{
    var $CI;
    var $api_error;

    function __construct()
    {
        $this->api_error = '';
        $this->CI = &get_instance();
        $this->CI->load->config('stripe');

        // Include the Stripe PHP bindings library 
        require APPPATH . 'third_party/stripe-php/init.php';

        // Set API key 
        \Stripe\Stripe::setApiKey($this->CI->config->item('stripe_api_key'));
    }

    function addCustomer($email, $token)
    {


        try {
            // Add customer to stripe 
            /*$customer = new \Stripe\StripeClient(
  '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'
);
$customer->customers->create(array(
   'email' => $email, 
                'source'  => $token 
));*/
            // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51SPt1WHz56QdCFhGDFDPRQJKoTJPtDTWEORXDCXjLUIVAEvtUSfxZZbGVhsBDwVmRVO5cy9vLWpXRMCm2L5RHhyd00bSR00OZI');

            $customer = \Stripe\Customer::create([
                'email' => $email,
                'source'  => $token

            ]);

            return $customer;
        } catch (Exception $e) {
            $this->api_error = $e->getMessage();
            return false;
        }
    }

    function createCharge($customerId, $itemName, $itemPrice)
    {
        // Convert price to cents 
        $itemPriceCents = ($itemPrice * 100);
        $currency = $this->CI->config->item('stripe_currency');
        //echo $itemName;
        //echo $customerId;
        //die();

        try {
            \Stripe\Stripe::setApiKey('sk_test_51SPt1WHz56QdCFhGDFDPRQJKoTJPtDTWEORXDCXjLUIVAEvtUSfxZZbGVhsBDwVmRVO5cy9vLWpXRMCm2L5RHhyd00bSR00OZI');
            $stripe = \Stripe\Charge::create(array(
                'customer' => $customerId,
                'amount'   => $itemPriceCents,
                'currency' => $currency,
                'description' => $itemName,
                'statement_descriptor_suffix' => 'IKIC'
            ));
            /*$stripe = new \Stripe\StripeClient(
  'sk_test_51JQJmtJ3I5H6iIMWORlo2i1EkSyTg4IhKLnwiJ5eG7PiSeDBgCCwUU0etpTzv6tdccexpN5rHGTplbG5pMaWN7sv00tNXg4KSJ'
);
$stripe->charges->create([
   'customer' => $customerId, 
                'amount'   => $itemPriceCents, 
                'currency' => $currency, 
                'description' => $itemName
]);*/
            $chargeJson = $stripe->jsonSerialize();
            return $chargeJson;
        } catch (Exception $e) {
            $this->api_error = $e->getMessage();
            return false;
        }
    }
    function retrieveCharge($chargeId)
    {
        echo $chargeId;

        try {
            \Stripe\Stripe::setApiKey('sk_test_51SPt1WHz56QdCFhGDFDPRQJKoTJPtDTWEORXDCXjLUIVAEvtUSfxZZbGVhsBDwVmRVO5cy9vLWpXRMCm2L5RHhyd00bSR00OZI');
            $charge = \Stripe\Charge::retrieve(array(
                $chargeId
            ));
            /*$charge = new \Stripe\StripeClient(
  'sk_test_51JQJmtJ3I5H6iIMWORlo2i1EkSyTg4IhKLnwiJ5eG7PiSeDBgCCwUU0etpTzv6tdccexpN5rHGTplbG5pMaWN7sv00tNXg4KSJ'
);
$charge->charges->retrieve(array(
  $chargeId,
   ));*/
            return $charge;
        } catch (Exception $e) {
            $this->api_error = $e->getMessage();
            return false;
        }
    }
}
