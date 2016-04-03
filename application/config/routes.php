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
$route['default_controller'] = 'WelcomeController';

//admin
$route['admin']['GET'] = 'admin/IndexController/index';

//kuliner
$route['admin/kuliner']['GET'] = 'admin/KulinerAcehController/index';

$route['admin/kuliner/tambah']['GET'] = 'admin/KulinerAcehController/tambahKuliner';
$route['admin/kuliner/simpan']['POST'] = 'admin/KulinerAcehController/simpanKuliner';

$route['admin/kuliner/ubah/(:any)']['GET'] = 'admin/KulinerAcehController/editKulinerAceh/$1';
$route['admin/kuliner/ubah']['POST'] = 'admin/KulinerAcehController/ubahKuliner';

$route['admin/kuliner/hapus/(:any)']['GET'] = 'admin/KulinerAcehController/hapusKuliner/$1';
//end kuliner

//wisata
$route['admin/wisata']['GET'] = 'admin/WisataAcehController/index';

$route['admin/wisata/tambah']['GET'] = 'admin/WisataAcehController/tambahWisata';
$route['admin/wisata/simpan']['POST'] = 'admin/WisataAcehController/simpanWisata';

$route['admin/wisata/ubah/(:any)']['GET'] = 'admin/WisataAcehController/editWisataAceh/$1';
$route['admin/wisata/ubah']['POST'] = 'admin/WisataAcehController/ubahWisata';

$route['admin/wisata/hapus/(:any)']['GET'] = 'admin/WisataAcehController/hapusWisata/$1';
//end wisata

//musik
$route['admin/musik']['GET'] = 'admin/MusikAcehController/index';

$route['admin/musik/tambah']['GET'] = 'admin/MusikAcehController/tambahMusik';
$route['admin/musik/simpan']['POST'] = 'admin/MusikAcehController/simpanMusik';

$route['admin/musik/ubah/(:any)']['GET'] = 'admin/MusikAcehController/editMusikAceh/$1';
$route['admin/musik/ubah']['POST'] = 'admin/MusikAcehController/ubahMusik';

$route['admin/musik/hapus/(:any)']['GET'] = 'admin/MusikAcehController/hapusMusik/$1';
//end musik

//tarian
$route['admin/tarian']['GET'] = 'admin/TarianAcehController/index';

$route['admin/tarian/tambah']['GET'] = 'admin/TarianAcehController/tambahTarian';
$route['admin/tarian/simpan']['POST'] = 'admin/TarianAcehController/simpanTarian';

$route['admin/tarian/ubah/(:any)']['GET'] = 'admin/TarianAcehController/editTarianAceh/$1';
$route['admin/tarian/ubah']['POST'] = 'admin/TarianAcehController/ubahTarian';

$route['admin/tarian/hapus/(:any)']['GET'] = 'admin/TarianAcehController/hapusTarian/$1';
//end tarian

//login view
$route['admin/login']['GET'] = 'admin/UserController/halamanUser';
$route['admin/login']['POST'] = 'admin/UserController/prosesLogin';
$route['admin/logout']['GET'] = 'admin/UserController/prosesLogout';
//end login view

//rest api
$route['api/kuliner']['GET'] = 'api/KulinerAcehRestController/kuliner';
$route['api/musik']['GET'] = 'api/MusikAcehRestController/musik';
$route['api/tarian']['GET'] = 'api/TarianAcehRestController/tarian';
$route['api/wisata']['GET'] = 'api/WisataAcehRestController/wisata';
//end rest api

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
