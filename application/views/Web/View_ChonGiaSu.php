<?php require(APPPATH.'views/web/layouts/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('public/') ?>admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('public/') ?>admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
    	<?php if(isset($error)){ ?>
            <div class="w-100 text-center">
                <span><?php echo $error; ?></span>
            </div>
            <br>
        <?php } ?>
        <form class="row" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="heading_s1">
                    <h4>Lớp Học Của Phụ Huynh</h4>
                </div>
                <div class="row">
                	<div class="col-md-12">
                		<div class="form-group mb-3">
		                    <label class="form-label">Mã Lớp Gia Sư</label>
		                    <input type="text" name="malopgiasu" class="form-control" placeholder="Mã Lớp Gia Sư *" required>
		                </div>
                	</div>
                </div>
               
                <button type="submit" class="btn btn-fill-out btn-block mt-2">Thuê Gia Sư Cho Lớp Này</button>
                <div class="text-center">
                	<a class="btn" href="<?php echo base_url('thue-gia-su/') ?>">Chưa Có Mã Lớp? Tạo Lớp Gia Sư Mới?</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Thông Tin Gia Sư</h4>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="form-group mb-3">
			                    <img style="display: block; margin-left: auto; margin-right: auto; border-radius: 10px; width: 130px; height: 150px" src="<?php echo $detail[0]['AnhThe']; ?>">
			                </div>
                    	</div>
                    	<hr>
                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Họ Tên</label>
			                    <input type="text" class="form-control" value="<?php echo $detail[0]['HoTen'] ?>" required disabled>
			                </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Năm Sinh</label>
			                    <input type="text" class="form-control" value="<?php echo $detail[0]['NgaySinh'] ?>" required disabled>
			                </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Giới Tính</label>
			                    <input type="text" class="form-control" value="<?php echo $detail[0]['GioiTinh'] == 0 ? "Nữ" : "Nam" ?>" required disabled>
			                </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Số Điện Thoại</label>
			                    <input type="text" class="form-control" value="<?php echo $detail[0]['SoDienThoai'] ?>" required disabled>
			                </div>
                    	</div>

                    	<div class="col-md-12">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Địa Chỉ</label>
			                    <input type="text" class="form-control" value="<?php echo $detail[0]['DiaChi'] ?>" required disabled>
			                </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Chuyên Ngành</label>
			                    <input type="text" class="form-control" value="<?php echo $detail[0]['ChuyenNganh'] ?>" required disabled>
			                </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Trường Học</label>
			                    <input type="text" class="form-control" value="<?php echo $detail[0]['TenTruong'] ?>" required disabled>
			                </div>
                    	</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
	.form-control:disabled, .form-control[readonly] {
	    background-color: white;
	    opacity: 1;
	}
</style>
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>


