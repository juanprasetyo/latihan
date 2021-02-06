<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller']          = 'C_User';
$route['404_override']                = '';
$route['translate_uri_dashes']        = false;

//======================================== Admin ==========================================//
$route['admin']                       = 'C_Admin';
$route['userGet']                     = 'C_Admin/get_user';
$route['add']                         = 'C_Admin/tambah_user';
$route['save']                        = 'C_Admin/save';
$route['delete']                      = 'C_Admin/delete';
$route['edit']                        = 'C_Admin/view_edit';
$route['edit/(:any)']                 = 'C_Admin/view_edit/$1';
$route['saveEdit']                    = 'C_Admin/save_edit';

//======================================== User ==========================================//
$route['user']                        = 'C_User';

//===================================== User & Admin =====================================//
$route['profile']                     = 'C_Latihan/view_profile';
$route['editProfile']                 = 'C_Latihan/edit_profile';
$route['saveEditProfile']             = 'C_Latihan/save_edit_profile';
$route['cetakSurat']                  = 'C_Latihan/cetakSurat';
$route['color']                       = 'C_Color';
$route['getColor']                    = 'C_Color/get_color';
$route['mirror']                      = 'C_Latihan/mirroring_data';
$route['editMirroring']               = 'C_Latihan/edit_user_mirroring';
$route['getUserAdmin']                = 'C_Latihan/get_user_admin';
$route['getUserKoor']                 = 'C_Latihan/get_user_koor';
$route['addUserAdmin']                = 'C_Latihan/add_user_admin';
$route['addUserKoor']                 = 'C_Latihan/add_user_koor';
$route['editUserAdmin']               = 'C_Latihan/edit_user_admin';
$route['editUserKoor']                = 'C_Latihan/edit_user_koor';
$route['deleteUserAdmin']             = 'C_Latihan/delete_user_admin';
$route['deleteUserKoor']              = 'C_Latihan/delete_user_koor';

//=================================== Login & Register ====================================//
$route['register']                    = 'C_Register';
$route['register(:any)']              = 'C_Register/$1';
$route['login']                       = 'C_Login';
$route['logout']                      = 'C_Login/logout';
$route['forgotPassword']              = 'C_Login/forgot_password';

//=================================== Menu Data Barang =====================================//
$route['DataBarang/listBarang']       = 'DataBarang/C_DataBarang';
$route['DataBarang/getBarang']        = 'DataBarang/C_DataBarang/get_barang';
$route['DataBarang/getDataBarang']    = 'DataBarang/C_DataBarang/get_data_barang';
$route['DataBarang/listBarang(:any)'] = 'DataBarang/C_DataBarang/$1';
$route['DataBarang/editBarang']       = 'DataBarang/C_DataBarang/edit_barang';
$route['DataBarang/delete']           = 'DataBarang/C_DataBarang/delete_barang';

$route['DataBarang/cariBarang']       = 'DataBarang/C_DataBarang/cariBarang';
$route['DataBarang/cariDataBarang']   = 'DataBarang/C_DataBarang/viewCariBarang';
$route['DataBarang/showDataBarang']   = 'DataBarang/C_DataBarang/show_selected_barang';
$route['DataBarang/exportExcel']      = 'DataBarang/C_DataBarang/exportExcel';
$route['DaraBarang/uploadDataByExcel']= 'DataBarang/C_DataBarang/uploadDataByExcel';