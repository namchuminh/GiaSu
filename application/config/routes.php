<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'TrangChu';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'Admin/TrangChu';

$route['admin/dang-nhap'] = 'Admin/DangNhap/index';
$route['admin/dang-xuat'] = 'Admin/DangXuat/index';

$route['admin/tin-tuc'] = 'Admin/TinTuc';
$route['admin/tin-tuc/(:any)/trang'] = 'Admin/TinTuc/page/$1';
$route['admin/tin-tuc/them'] = 'Admin/TinTuc/add';
$route['admin/tin-tuc/(:any)/sua'] = 'Admin/TinTuc/update/$1';
$route['admin/tin-tuc/(:any)/xoa'] = 'Admin/TinTuc/delete/$1';

$route['admin/lien-he'] = 'Admin/LienHe';
$route['admin/lien-he/(:any)/trang'] = 'Admin/LienHe/page/$1';
$route['admin/lien-he/(:any)/xem'] = 'Admin/LienHe/view/$1';

$route['admin/cau-hinh'] = 'Admin/CauHinh';

$route['admin/ca-nhan'] = 'Admin/CaNhan';

$route['admin/giao-dien'] = 'Admin/GiaoDien';
$route['admin/giao-dien/(:any)/trang'] = 'Admin/GiaoDien/page/$1';
$route['admin/giao-dien/them'] = 'Admin/GiaoDien/add';
$route['admin/giao-dien/(:any)/sua'] = 'Admin/GiaoDien/update/$1';
$route['admin/giao-dien/(:any)/xoa'] = 'Admin/GiaoDien/delete/$1';


$route['admin/mon-hoc'] = 'Admin/BoMon';
$route['admin/mon-hoc/(:any)/trang'] = 'Admin/BoMon/page/$1';
$route['admin/mon-hoc/them'] = 'Admin/BoMon/add';
$route['admin/mon-hoc/(:any)/sua'] = 'Admin/BoMon/update/$1';
$route['admin/mon-hoc/(:any)/xoa'] = 'Admin/BoMon/delete/$1';

$route['admin/lop-hoc'] = 'Admin/LopHoc';
$route['admin/lop-hoc/(:any)/trang'] = 'Admin/LopHoc/page/$1';
$route['admin/lop-hoc/them'] = 'Admin/LopHoc/add';
$route['admin/lop-hoc/(:any)/sua'] = 'Admin/LopHoc/update/$1';
$route['admin/lop-hoc/(:any)/xoa'] = 'Admin/LopHoc/delete/$1';


$route['admin/vi-tri'] = 'Admin/ViTri';
$route['admin/vi-tri/(:any)/trang'] = 'Admin/ViTri/page/$1';
$route['admin/vi-tri/them'] = 'Admin/ViTri/add';
$route['admin/vi-tri/(:any)/sua'] = 'Admin/ViTri/update/$1';
$route['admin/vi-tri/(:any)/xoa'] = 'Admin/ViTri/delete/$1';

$route['admin/vi-tri/(:any)/xem'] = 'Admin/ViTri/view/$1';
$route['admin/vi-tri/(:any)/quan-huyen/them'] = 'Admin/ViTri/addDistrict/$1';
$route['admin/vi-tri/(:any)/quan-huyen/(:any)/sua'] = 'Admin/ViTri/updateDistrict/$1/$2';
$route['admin/vi-tri/(:any)/quan-huyen/(:any)/xoa'] = 'Admin/ViTri/deleteDistrict/$1/$2';

$route['admin/gia-su'] = 'Admin/GiaSu';
$route['admin/gia-su/(:any)/trang'] = 'Admin/GiaSu/page/$1';
$route['admin/gia-su/them'] = 'Admin/GiaSu/add';
$route['admin/gia-su/(:any)/sua'] = 'Admin/GiaSu/update/$1';
$route['admin/gia-su/(:any)/xoa'] = 'Admin/GiaSu/delete/$1';

$route['admin/gia-su/cho-duyet'] = 'Admin/GiaSu/viewAccept';
$route['admin/gia-su/cho-duyet/(:any)/trang'] = 'Admin/GiaSu/pageAccept/$1';
$route['admin/gia-su/cho-duyet/(:any)/duyet'] = 'Admin/GiaSu/accept/$1';


$route['admin/gia-su/(:any)/lop'] = 'Admin/GiaSu/class/$1';
$route['admin/gia-su/(:any)/mon'] = 'Admin/GiaSu/subject/$1';
$route['admin/gia-su/(:any)/vi-tri'] = 'Admin/GiaSu/location/$1';

$route['admin/lop-hoc/(:any)/gia-su'] = 'Admin/LopHoc/tutor/$1';
$route['admin/lop-hoc/(:any)/gia-su/(:any)/trang'] = 'Admin/LopHoc/pageTutor/$1/$2';

$route['admin/mon-hoc/(:any)/gia-su'] = 'Admin/BoMon/tutor/$1';
$route['admin/mon-hoc/(:any)/gia-su/(:any)/trang'] = 'Admin/BoMon/pageTutor/$1/$2';


$route['admin/vi-tri/(:any)/gia-su'] = 'Admin/ViTri/tutor/$1';
$route['admin/vi-tri/(:any)/gia-su/(:any)/trang'] = 'Admin/ViTri/pageTutor/$1/$2';



$route['admin/lop-gia-su'] = 'Admin/LopGiaSu';
$route['admin/lop-gia-su/(:any)/trang'] = 'Admin/LopGiaSu/page/$1';
$route['admin/lop-gia-su/them'] = 'Admin/LopGiaSu/add';
$route['admin/lop-gia-su/(:any)/sua'] = 'Admin/LopGiaSu/update/$1';
$route['admin/lop-gia-su/(:any)/xoa'] = 'Admin/LopGiaSu/delete/$1';
$route['admin/lop-gia-su/(:any)/them-gia-su'] = 'Admin/LopGiaSu/addTutor/$1';
$route['admin/lop-gia-su/(:any)/gia-su'] = 'Admin/LopGiaSu/tutor/$1';
$route['admin/lop-gia-su/(:any)/gia-su/(:any)/xoa'] = 'Admin/LopGiaSu/deleteTutor/$1/$2';


$route['gia-su'] = 'Web/GiaSu';
$route['gia-su/trang/(:any)'] = 'Web/GiaSu/page/$1';


$route['khu-vuc'] = 'Web/KhuVuc';
$route['khu-vuc/trang/(:any)'] = 'Web/KhuVuc/page/$1';
$route['khu-vuc/(:any)'] = 'Web/KhuVuc/detail/$1';
$route['khu-vuc/(:any)/trang/(:any)'] = 'Web/KhuVuc/detailPage/$1/$2';


$route['mon-hoc'] = 'Web/BoMon';
$route['mon-hoc/trang/(:any)'] = 'Web/BoMon/page/$1';
$route['mon-hoc/(:any)'] = 'Web/BoMon/detail/$1';
$route['mon-hoc/(:any)/trang/(:any)'] = 'Web/BoMon/detailPage/$1/$2';

$route['lop-hoc'] = 'Web/LopHoc';
$route['lop-hoc/trang/(:any)'] = 'Web/LopHoc/page/$1';
$route['lop-hoc/(:any)'] = 'Web/LopHoc/detail/$1';
$route['lop-hoc/(:any)/trang/(:any)'] = 'Web/LopHoc/detailPage/$1/$2';

$route['tin-tuc'] = 'Web/TinTuc';
$route['tin-tuc/(:any)'] = 'Web/TinTuc/detail/$1';
$route['tin-tuc/trang/(:any)'] = 'Web/TinTuc/page/$1';


$route['lien-he'] = 'Web/LienHe';

$route['thue-gia-su'] = 'Web/LopGiaSu';
$route['lam-gia-su'] = 'Web/GiaSu/register';


$route['lay-quan-huyen'] = 'Web/LopGiaSu/getDistrict';
$route['lay-mon-hoc'] = 'Web/LopGiaSu/getSubject';



