<?php require(APPPATH.'views/web/layouts/header.php'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>
                        <?php if(isset($_GET['s']) && !empty($_GET['s'])){ ?>
                            Tìm Kiếm: <?php echo $_GET['s']; ?>
                        <?php }else{ ?>
                            <?php echo $title; ?>
                        <?php } ?>
                    </h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('tin-tuc/'); ?>">Tin Tức</a></li>
                    <li class="breadcrumb-item active">
                        <?php if(isset($_GET['s']) && !empty($_GET['s'])){ ?>
                            Tìm Kiếm
                        <?php }else{ ?>
                            <?php echo $title; ?>
                        <?php } ?>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row blog_thumbs">
                    <?php if(isset($_GET['s']) && !empty($_GET['s']) && (count($list) == 0)){ ?>
                        <p class="text-center">Không tìm thấy tin tức!</p>
                    <?php } ?>
                    <?php foreach ($list as $key => $value): ?>
                        <div class="col-12">
                            <div class="blog_post blog_style2">
                                <div class="blog_img">
                                    <a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/') ?>">
                                        <img style="height: 222px;" src="<?php echo $value['HinhAnh']; ?>" alt="<?php echo $value['TieuDe']; ?>">
                                    </a>
                                </div>
                                <div class="blog_content bg-white">
                                    <div class="blog_text">
                                        <h6 class="blog_title"><a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/') ?>"><?php echo $value['TieuDe']; ?></a></h6>
                                        <ul class="list_none blog_meta">
                                            <li><a href="#"><i class="ti-calendar"></i> <?php echo date("d-m-Y", strtotime($value['ThoiGian'])); ?></a></li>
                                            <li><a href="#"><i class="ti-user"></i> <?php echo $value['HoTen']; ?></a></li>
                                        </ul>
                                        <p><?php echo substr(strip_tags($value['NoiDung']), 0, 140); ?> ...</p>
                                        <a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/') ?>" class="btn btn-fill-line border-2 btn-xs rounded-0">ĐỌC THÊM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                            <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                                <li class="page-item"><a class="page-link" href="<?php echo base_url('tin-tuc/trang/'.$i.'/') ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                <div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">Tìm Kiếm</h5>
                        <div class="search_form">
                            <form action="<?php echo base_url('tin-tuc/') ?>"> 
                                <input required class="form-control" name="s" placeholder="Nhập tiêu đề tin tức..." type="text">
                                <button type="submit" title="Subscribe" class="btn icon_search" value="Tìm Kiếm">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Tìm Gia Sư Theo Lớp</h5>
                        <ul class="widget_categories">
                            <?php foreach ($class as $key => $value): ?>
                                <li><a href="<?php echo base_url('lop-hoc/'.$value['DuongDan'].'/'); ?>"><span class="categories_name"><?php echo $value['TenLopHoc']; ?></span></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Tìm Gia Sư Theo Môn</h5>
                        <ul class="widget_categories">
                            <?php foreach ($subject as $key => $value): ?>
                                <li><a href="<?php echo base_url('mon-hoc/'.$value['DuongDan'].'/'); ?>"><span class="categories_name"><?php echo $value['TenBoMon']; ?></span></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Tìm Gia Sư Khu Vực</h5>
                        <ul class="widget_categories">
                            <?php foreach ($province as $key => $value): ?>
                                <li><a href="<?php echo base_url('khu-vuc/'.$value['DuongDan'].'/'); ?>"><span class="categories_name"><?php echo $value['TenTinhThanh']; ?></span></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php if(count($banner1) >= 1){ ?>
                        <div class="widget">
                            <div class="shop_banner">
                                <a href="<?php echo base_url('chuyen-muc/'.$banner1[0]['DuongDan'].'/'); ?>" class="banner_img">
                                    <img style="width: 255px; height: 350px;" src="<?php echo $banner1[0]['HinhAnh'] ?>" alt="sidebar_banner_img">
                                </a> 
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
