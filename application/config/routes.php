<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

////////////// Main Pages URLS ///////////////////
$route['about-us'] = 'AboutUs/index';
$route['employers'] = 'Employers/index';
$route['how-it-works'] = 'HowItWorks/index';
///// Auth URLS //////////////
$route['sign-in/(:any)'] = 'auth/login/$1';
$route['sign-in'] = 'auth/login';
//$route['sign-in'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['register/(:any)'] = 'auth/register/$1';
$route['register'] = 'auth/register';
//$route['register'] = 'auth/register';
$route['forgot-password'] = 'auth/forgotPassword';
$route['logout'] = 'auth/logout';

//////////  Employer URL's   ///////////////////
$route['employer/dashboard'] = 'employer/Dashboard/index';
$route['employer/post-a-job'] = 'employer/JobManagement/postajob';
$route['employer/jobs-listing'] = 'employer/JobManagement/listing';
$route['employer/payment-history'] = 'employer/Orders';
$route['candidate/applications'] = 'employer/Applications';
//$route['employer/job-analytics/(:num)'] = 'employer/Analytics/by_job/$1';
//$route['employer/job-analytics'] = 'employer/Analytics/by_job';

$route['employer/JobManagement/getjobs/(:num)'] = 'employer/JobManagement/getjobs/$1';
$route['employer/JobManagement/getjobs'] = 'employer/JobManagement/getjobs';

////////// PRICING URL'S   //////////////
$route['pricing-plans'] = 'Pricing/index';
$route['pricing/checkout'] = 'Pricing/checkout';
