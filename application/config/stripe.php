<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
//$config['stripe_api_key']         = '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'; 
//$config['stripe_publishable_key'] = 'pk_live_51SPt1WHz56QdCFhGkeptp2RdtKFCTCVWPat595WfQKhvMoVwsyKuP70bVZ323P981y4sJiV9s8QaApw0VLUF7tfj00LV0fPcRz'; 
$config['stripe_api_key']         = 'sk_test_51SPt1WHz56QdCFhGDFDPRQJKoTJPtDTWEORXDCXjLUIVAEvtUSfxZZbGVhsBDwVmRVO5cy9vLWpXRMCm2L5RHhyd00bSR00OZI'; 
$config['stripe_publishable_key'] = 'pk_test_51SPt1WHz56QdCFhGsjKLXIZ3aHN9dKdbcYCBJCH18HTppZRjW9Ieh3tUKdgBbUEdQ5S4EFQ6tLEsYeiZReFxcl1800gJRGbrrx'; 
$config['stripe_currency']        = 'cad';