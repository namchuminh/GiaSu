<?php require(APPPATH.'views/web/layouts/header.php'); ?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>
                        <?php echo $title; ?>
                    </h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('gia-su/'); ?>">Gia Sư</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo $title; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                    <i class="fas fa-check-circle"></i>
                    <div class="heading_s1">
                    <h3>Yêu Cầu Thuê Gia Sư Thành Công!</h3>
                    <br>
                    <h3>Mã Lớp Gia Sư: LOP#000<?php echo $malopgiasu; ?></h3>
                    </div>
                    <p>Cảm ơn bạn đã đăng ký thuê gia sư trên hệ thống, chúng tôi sẽ tiếp nhận thông tin của bạn và liên hệ kết nối gia sư cho bạn sớm nhất có thể! Xin cảm ơn!</a></p>
                    <a href="<?php echo base_url(); ?>" class="btn btn-fill-out">Về Trang Chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
