<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['Ward']='Ward';
$route['Ward/(:any)']='Ward/$1';
$route['City']='City';
$route['City/(:any)']='City/$1';
$route['Member']='Member';
$route['Member/(:any)']='Member/$1';
$route['MemberProfile/(:num)/(:num)']='Family/MemberProfile/$1/$2';
$route['DropDown']='DropDown';
$route['Admin']='Admin';
$route['Admin/(:any)']='Admin/$1';
$route['default_controller'] = 'Family/';
$route['(:any)']='Family/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
