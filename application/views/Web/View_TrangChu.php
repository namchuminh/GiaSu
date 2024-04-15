<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $config[0]['MoTaWeb']; ?>">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

<!-- SITE TITLE -->
<title><?php echo $title; ?></title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/web/'); ?>assets/images/favicon.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/themify-icons.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/linearicons.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/flaticon.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/simple-line-icons.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/magnific-popup.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/slick.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url('public/web/'); ?>assets/css/responsive.css">

</head>

<body>


<!-- START HEADER -->
<header class="header_wrap">
	<div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                	<div class="header_topbar_info">
                    	<div class="download_wrap">
                            <span class="me-3">Website Tìm Kiếm Thuê Gia Sư Và Tìm Lớp Gia Sư Cho Phụ Huynh!</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="header_offer">
                            <a href="<?php echo base_url('khach-hang/'); ?>" style="color: white;">Tìm Gia Sư</a>
                        </div>
                        <div class="download_wrap">
                            <a href="<?php echo base_url('dang-xuat/'); ?>" style="color: white;">Đăng Ký Gia Sư</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
    	<div class="custom-container">
        	<div class="nav_block">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img class="logo_light" src="<?php echo $config[0]['Logo'] ?>" alt="logo" />
                    <img class="logo_dark" src="<?php echo $config[0]['Logo'] ?>" alt="logo" />
                </a>
                <div class="product_search_form rounded_input">
                    <form action="<?php echo base_url('mon-hoc/') ?>">
                        <div class="input-group">
                            <input class="form-control" placeholder="Nhập tên môn học ..." required="" name="s" type="text">
                            <button type="submit" class="search_btn3"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
    	<div class="custom-container">
            <div class="row"> 
            	<div class="col-lg-3 col-md-4 col-sm-6 col-3">
                	<div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn">
                            <i class="linearicons-menu"></i><span>DANH SÁCH Lớp Học </span>
                        </button>
                        <div id="navCatContent" class="nav_cat navbar collapse">
                            <ul> 
                                <?php foreach ($class as $key => $value): ?>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="<?php echo base_url('lop-hoc/'.$value['DuongDan'].'/'); ?>">
                                            <img style="width: 30px; height: 30px;" src="<?php echo base_url('public/web/assets/images/presentation.png'); ?>">
                                            <span style="color: black; font-family: system-ui; font-size:15px; margin-left: 10px;"><?php echo $value['TenLopHoc']; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div> 
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
							<ul class="navbar-nav">
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a>   
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url('gia-su/'); ?>" style="font-family: system-ui;">Danh Sách Gia Sư</a>   
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url('khu-vuc/'); ?>" style="font-family: system-ui;">Gia Sư Khu Vực</a>   
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url('mon-hoc/'); ?>" style="font-family: system-ui;">Gia Sư Môn Học</a>   
                                </li>
                                <li class="dropdown">
                                    <a class="nav-link" href="<?php echo base_url('lop-hoc/'); ?>" style="font-family: system-ui;">Gia Sư Lớp Học</a>   
                                </li>
                                <li><a class="nav-link nav_item" href="<?php echo base_url('tin-tuc/'); ?>" style="font-family: system-ui;">Tin Tức</a></li> 
                                <li><a class="nav-link nav_item" href="<?php echo base_url('lien-he/'); ?>" style="font-family: system-ui;">Liên Hệ</a></li> 
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span><?php echo $config[0]['SoDienThoai'] ?></span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->

<!-- START SECTION BANNER -->
<div class="mt-4 staggered-animation-wrap">
	<div class="custom-container">
    	<div class="row">
        	<div class="col-lg-9 offset-lg-3">
            	<div class="banner_section shop_el_slider">
                    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if(count($slide) >= 1){ ?>
                                <a href="<?php echo $slide[0]['DuongDan'] ?>" class="carousel-item active background_bg" data-img-src="<?php echo $slide[0]['HinhAnh'] ?>">
                                </a>
                            <?php } ?>

                            <?php if(count($slide) >= 2){ ?>
                                <a href="<?php echo $slide[1]['DuongDan'] ?>" class="carousel-item background_bg" data-img-src="<?php echo $slide[1]['HinhAnh'] ?>">
                                </a>
                            <?php } ?>

                            <?php if(count($slide) >= 3){ ?>
                                <a href="<?php echo $slide[2]['DuongDan'] ?>" class="carousel-item background_bg" data-img-src="<?php echo $slide[2]['HinhAnh'] ?>">
                                </a>
                            <?php } ?>
                        </div>
                        <ol class="carousel-indicators indicators_style3">
                            <?php if(count($slide) >= 1){ ?>
                                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
                            <?php } ?>
                            <?php if(count($slide) >= 2){ ?>
                                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
                            <?php } ?>
                            <?php if(count($slide) >= 3){ ?>
                                <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section small_pt pb-0">
	<div class="custom-container">
    	<div class="row">
            <?php if(count($banner1) >= 1){ ?>
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="sale-banner">
                        <a class="hover_effect1" href="<?php echo $banner1[0]['DuongDan'] ?>">
                            <img src="<?php echo $banner1[0]['HinhAnh']; ?>" style="width: 387px; height: 538px;">
                        </a>
                    </div>
                </div>
            <?php } ?>
        	
        	<div <?php echo count($banner1) >= 1 ? 'class="col-xl-9"' : 'class="col-xl-12"'?>>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Danh Sách Gia Sư Mới</h4>
                            </div>
                            <div class="view_all">
                                <a href="<?php echo base_url('gia-su/'); ?>" class="text_default"><i class="linearicons-power"></i> <span>Xem Tất Cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1"  data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                            <?php foreach ($new as $key => $value): ?>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="<?php echo base_url('gia-su/'.$value['MaGiaSu'].'/') ?>">
                                                <img src="<?php echo $value['AnhThe']; ?>" alt="el_img2" style="height: 250px;">
                                                <img class="product_hover_img" src="<?php echo $value['AnhThe']; ?>" alt="el_hover_img2" style="height: 250px;">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title text-center"><a href="<?php echo base_url('gia-su/'.$value['MaGiaSu'].'/') ?>"><?php echo $value['HoTen'] ?></a></h6>
                                            <hr>
                                            <div class="product_price">
                                                <ul>
                                                    <li>Lương tối thiểu: <?php echo number_format($value['LuongToiThieu']); ?>đ</li>
                                                    <li>Giới tính:  <?php echo $value['GioiTinh'] == 1 ? "Nam" : "Nữ"; ?></li>
                                                    <li>Ngành:  <?php echo $value['ChuyenNganh']; ?></li>
                                                    <li>Số buổi:  <?php echo $value['SoBuoiDay']; ?> dạy / 1 tuần</li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <button class="btn btn-fill-out w-100 add-to-cart" style="line-height: unset; padding: none; padding: 5px 5px;">Chọn Gia Sư</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION BANNER --> 
<div class="section pb_20 small_pt">
	<div class="custom-container">
    	<div class="row">
            <?php if(count($banner2) >= 1){ ?>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="<?php echo $banner2[0]['DuongDan'] ?>">
                            <img src="<?php echo $banner2[0]['HinhAnh']; ?>" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
            <?php } ?>

            <?php if(count($banner2) >= 2){ ?>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="<?php echo $banner2[1]['DuongDan'] ?>">
                            <img src="<?php echo $banner2[1]['HinhAnh']; ?>" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
            <?php } ?>

            <?php if(count($banner2) >= 3){ ?>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="<?php $banner2[2]['DuongDan'] ?>">
                            <img src="<?php echo $banner2[2]['HinhAnh']; ?>" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- END SECTION BANNER --> 


<!-- START SECTION SHOP -->
<div class="section small_pt small_pb">
	<div class="custom-container">
    	<div class="row">
            <?php if(count($banner3) >= 1){ ?>
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="sale-banner">
                        <a class="hover_effect1" href="<?php echo $banner3[0]['DuongDan'] ?>">
                            <img src="<?php echo $banner3[0]['HinhAnh']; ?>" style="height: 538px;">
                        </a>
                    </div>
                </div>
            <?php } ?>

        	<div <?php echo count($banner1) >= 1 ? 'class="col-xl-9"' : 'class="col-xl-12"'?>>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Gia Sư Theo Khu Vực</h4>
                            </div>
                            <div class="view_all">
                            	<a href="<?php echo base_url('khu-vuc/'); ?>" class="text_default"><i class="linearicons-power"></i> <span>Xem Tất Cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                            <?php foreach ($province as $key => $value): ?>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="<?php echo base_url('gia-su/'.$value['MaGiaSu'].'/') ?>">
                                                <img src="<?php echo $value['AnhThe']; ?>" alt="el_img2" style="height: 250px;">
                                                <img class="product_hover_img" src="<?php echo $value['AnhThe']; ?>" alt="el_hover_img2" style="height: 250px;">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title text-center"><a href="<?php echo base_url('gia-su/'.$value['MaGiaSu'].'/') ?>"><?php echo $value['HoTen'] ?></a></h6>
                                            <hr>
                                            <div class="product_price">
                                                <ul>
                                                    <li>Khu Vực:  <?php echo $value['TenTinhThanh']; ?></li>
                                                    <li>Lương tối thiểu: <?php echo number_format($value['LuongToiThieu']); ?>đ</li>
                                                    <li>Ngành:  <?php echo $value['ChuyenNganh']; ?></li>
                                                    <li>Số buổi:  <?php echo $value['SoBuoiDay']; ?> dạy / 1 tuần</li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <button class="btn btn-fill-out w-100 add-to-cart" style="line-height: unset; padding: none; padding: 5px 5px;">Chọn Gia Sư</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SHOP -->
<div class="section small_pt small_pb">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Gia Sư Theo Môn Học</h4>
                            </div>
                            <div class="view_all">
                                <a href="<?php echo base_url('mon-hoc/'); ?>" class="text_default"><i class="linearicons-power"></i> <span>Xem Tất Cả</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "5"}}'>
                            <?php foreach ($subject as $key => $value): ?>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="<?php echo base_url('gia-su/'.$value['MaGiaSu'].'/') ?>">
                                                <img src="<?php echo $value['AnhThe']; ?>" alt="el_img2" style="height: 250px;">
                                                <img class="product_hover_img" src="<?php echo $value['AnhThe']; ?>" alt="el_hover_img2" style="height: 250px;">
                                            </a>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title text-center"><a href="<?php echo base_url('gia-su/'.$value['MaGiaSu'].'/') ?>"><?php echo $value['HoTen'] ?></a></h6>
                                            <hr>
                                            <div class="product_price">
                                                <ul>
                                                    <li>Môn Học:  <?php echo $value['TenBoMon']; ?></li>
                                                    <li>Lương tối thiểu: <?php echo number_format($value['LuongToiThieu']); ?>đ</li>
                                                    <li>Ngành:  <?php echo $value['ChuyenNganh']; ?></li>
                                                    <li>Số buổi:  <?php echo $value['SoBuoiDay']; ?> dạy / 1 tuần</li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <button class="btn btn-fill-out w-100 add-to-cart" style="line-height: unset; padding: none; padding: 5px 5px;">Chọn Gia Sư</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<div class="middle_footer">
    <div class="custom-container">
        <div class="row">
            <div class="col-12">
                <div class="shopping_info">
                    <div class="row justify-content-center">
                        <div class="col-md-4">  
                            <div class="icon_box icon_box_style2">
                                <div class="icon">
                                    <i class="flaticon-shipped"></i>
                                </div>
                                <div class="icon_box_content">
                                    <h5>Gia Sư Uy Tín</h5>
                                    <p>Tất cả gia sư thuộc hệ thống đều có chuyên môn cao và trách nhiệm!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="icon_box icon_box_style2">
                                <div class="icon">
                                    <i class="flaticon-money-back"></i>
                                </div>
                                <div class="icon_box_content">
                                    <h5>Chi Phí Phù Hợp</h5>
                                    <p>Mọi khoản thu về thuê gia sư trên hệ thống đều ở mức bình dân!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="icon_box icon_box_style2">
                                <div class="icon">
                                    <i class="flaticon-support"></i>
                                </div>
                                <div class="icon_box_content">
                                    <h5>Hỗ trợ 24/7</h5>
                                    <p>Luôn sẵn sàng hỗ trợ người học mọi lúc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="<?php echo base_url(); ?>"><img style="width: 182px; height: 47px;" src="<?php echo $config[0]['Logo']; ?>" alt="logo"/></a>
                        </div>
                        <p><?php echo $config[0]['MoTaWeb']; ?></p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Chức Năng</h6>
                        <ul class="widget_links">
                            <li><a href="<?php echo base_url('san-pham/'); ?>">Sản Phẩm</a></li>
                            <li><a href="<?php echo base_url('chuyen-muc/'); ?>">Chuyên Mục</a></li>
                            <li><a href="<?php echo base_url('tin-tuc/'); ?>">Tin Tức</a></li>
                            <li><a href="<?php echo base_url('gio-hang/'); ?>">Giỏ Hàng</a></li>
                            <li><a href="<?php echo base_url('lien-he/'); ?>">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Lớp Học</h6>
                        <ul class="widget_links">
                            <?php foreach ($class as $key => $value): ?>
                                <?php if($key == 5){ break; } ?>
                                <li><a href="<?php echo base_url('lop-hoc/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenLopHoc']; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Tài Khoản</h6>
                        <ul class="widget_links">
                            <li><a href="<?php echo base_url('khach-hang/'); ?>">Khách Hàng</a></li>
                            <li><a href="<?php echo base_url('khach-hang/'); ?>">Đơn Hàng</a></li>
                            <li><a href="<?php echo base_url('thanh-toan/'); ?>">Thanh Toán</a></li>
                            <li><a href="<?php echo base_url('dang-nhap/'); ?>">Đăng Nhập</a></li>
                            <li><a href="<?php echo base_url('dang-ky/'); ?>">Đăng Ký</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Thông Tin</h6>
                        <ul class="contact_info contact_info_light">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p><?php echo $config[0]['DiaChi']; ?></p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:<?php echo $config[0]['Email']; ?>"><?php echo $config[0]['Email']; ?></a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <a href="tel:<?php echo $config[0]['SoDienThoai']; ?>" style="letter-spacing: 2px;"><?php echo $config[0]['SoDienThoai']; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->


<style type="text/css">
    .carousel_slider li{
        color: #333;
        font-size: 14px;
        line-height: 30px;
    }
</style>

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery-3.6.0.min.js"></script> 
<!-- popper min js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="<?php echo base_url('public/web/') ?>assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="<?php echo base_url('public/web/') ?>assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="<?php echo base_url('public/web/') ?>assets/js/scripts.js"></script>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $(".add-to-cart").click(function(e){
            e.preventDefault()
            var masanpham = $(this).attr("value");
            let urlThem = "<?php echo base_url('gio-hang/them/') ?>" + masanpham + "/" + "1";

            $.get(urlThem, function(data){
                var cart = JSON.parse(data);
                $(".cart_count").text(cart.numberCart)
                $(".price_symbole").text(cart.sumCart + "đ")

                $('.cart_list').empty();
                var cartList = cart.cart;

                for (const key in cartList) {
                    if (cartList.hasOwnProperty(key)) {
                        const item = cartList[key];
                        var formatter = new Intl.NumberFormat('en-US');
                        var price = formatter.format(item.price);
                        $('.cart_list').append('<li> <a href="<?php echo base_url('san-pham/') ?>'+item.slug+'/"><img src="'+item.image+'" style="height: 80px">'+item.name+'</a> <span class="cart_quantity"> '+item.number+' x <span class="cart_amount"> <span class="price_symbole"></span></span>'+price+'đ</span> </li>');
                    }
                }
            })

        });
    });
</script>