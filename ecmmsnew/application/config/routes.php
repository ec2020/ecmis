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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'user';
$route['ajaxleavecount']='ajaxget/getLeaveCountViaCategory';
$route['login'] = 'user/login';
$route['login_out'] = 'redirectsite/login';
$route['employee'] = 'employee';
$route['employee/save'] = 'employee/save';
$route['employee/addleave'] = 'employee/addleave';
$route['employee/addleavesave'] ='employee/addleavesave';
$route['dashboard/deleteleave/'] ='dashboard/deleteleave';
$route['reports'] = 'reports';
$route['reports/leaveList'] = 'reports/leaveList';
$route['reports/leavepdf'] = 'reports/leavepdf';
$route['reports/genIndividualReport'] = 'reports/genIndividualReport';
$route['reports/genDeptReport'] = 'reports/genDeptReport';
$route['leavehistory'] = 'leavehistory';
$route['backup'] = 'backup';
$route['holiday'] = 'holiday';
$route['applyleave'] = 'applyleave';
$route['applyleave/save'] = 'applyleave/save';
$route['applyLeave/update'] = 'applyLeave/update';
$route['applyleave/update_save'] = 'applyleave/update_save';
$route['applyleave/approve/(:num)'] = 'applyleave/approve/$1';
$route['approve'] = 'approve';
$route['approve/approve'] = 'approve/approve';
$route['approve/viewLeave/(:num)'] = 'approve/viewLeave/$1';
$route['overlook'] = 'overlook';
$route['overlook/accept/(:num)'] = 'overlook/accept/$1';
$route['model/apprve/(:num)'] = 'model/viewLeaveDetails/$1';
$route['password'] = 'password';
$route['password/change'] = 'password/change';
$route['dashboard'] = 'dashboard';
$route['logout'] = 'logout';
$route['404_override'] = '';
$route['complain'] = 'complain';
$route['translate_uri_dashes'] = FALSE;
$route['complain/save'] = 'complain/save';
