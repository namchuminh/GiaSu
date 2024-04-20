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
                    <h4>Thông Tin Cá Nhân Gia Sư</h4>
                </div>
                <div class="row">
                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Họ Tên</label>
		                    <input type="text" name="hoten" class="form-control" placeholder="Họ Tên Gia Sư *" required>
		                </div>
                	</div>
                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Ngày Sinh</label>
		                    <input type="date" name="ngaysinh" class="form-control" required>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
	                        <label class="form-label">Giới Tính</label>
	                        <select name="gioitinh" class="form-control">
	                            <option value="1">Nam</option>
	                            <option value="0">Nữ</option>
	                        </select>
	                    </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Tỉnh / Thành Phố</label>
		                    <select id="matinhthanh" name="matinhthanh" class="form-control">
		                        <option hidden>Chọn Tỉnh Thành</option>
		                        <?php foreach ($province as $key => $value): ?>
		                            <option value="<?php echo $value['MaTinhThanh']; ?>"><?php echo $value['TenTinhThanh']; ?></option>
		                        <?php endforeach ?>
		                    </select>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Quận / Huyện  Gia Sư</label>
		                    <select id="maquanhuyen" name="maquanhuyen[]" class="form-control quanhuyen" multiple>
		                    </select>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Địa Chỉ Thường Trú</label>
		                    <input type="text" name="diachi" class="form-control" placeholder="Đ/C Hiện Tại Của Gia Sư *" required>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Số Điện Thoại</label>
		                    <input type="text" name="sodienthoai" class="form-control" placeholder="Số Điện Thoại Gia Sư *" required>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Email</label>
		                    <input type="email" name="email" class="form-control" placeholder="Email Gia Sư *" required>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Ảnh Thẻ</label>
		                    <input type="file" name="anhthe" class="form-control" required>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Ảnh CCCD Mặt Trước</label>
		                    <input type="file" name="anhcccdmattruoc" class="form-control" required>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Ảnh CCCD Mặt Sau</label>
		                    <input type="file" name="anhcccdmatsau" class="form-control" required>
		                </div>
                	</div>

                	<div class="col-md-6">
                		<div class="form-group mb-3">
		                    <label class="form-label">Ảnh Bằng Cấp / Thẻ Sinh Viên</label>
		                    <input type="file" name="anhbangcapsinhvien" class="form-control" required>
		                </div>
                	</div>
                </div>
               
                <button type="submit" class="btn btn-fill-out btn-block mt-2">Đăng Ký Làm Gia Sư</button>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Thông Tin Giảng Dạy</h4>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Chuyên Ngành</label>
			                    <input type="text" name="chuyennganh" class="form-control" placeholder="Chuyên Ngành Gia Sư *" required>
			                </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
		                        <label class="form-label">Chức Danh</label>
		                        <select name="chucvu" class="form-control">
		                            <option value="0">Sinh Viên</option>
		                            <option value="1">Giảng Viên</option>
		                        </select>
		                    </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Trường Đại Học</label>
			                    <input type="text" name="tentruong" class="form-control" placeholder="Tên Trường Đại Học *" required>
			                </div>
                    	</div>

                    	<div class="col-md-6">
                    		<div class="form-group mb-3">
			                    <label class="form-label">Năm Tốt Nghiệp</label>
			                    <input type="number" name="namtotnghiep" class="form-control" placeholder="Năm Tốt Nghiệp *" required>
			                </div>
                    	</div>
                    </div>

	                <div class="form-group mb-3">
	                    <label class="form-label">Mức Lương Tối Thiểu</label>
                        <input type="text" name="luongtoithieu" class="form-control" placeholder="Mức Lương Theo Tháng *" oninput="formatCurrency(this)" required>
	                </div>

	                <div class="form-group mb-3">
                        <label class="form-label">Số Buổi Dạy / Tuần</label>
                        <input type="text" name="sobuoiday" class="form-control" placeholder="Số Buổi Dạy Trong 1 Tuần *" required>
                    </div>

                    <div class="form-group mb-3">
	                    <label class="form-label">Lớp Giảng Dạy</label>
	                    <select id="malophoc" name="malophoc[]" class="form-control lophoc" multiple>
	                    	<?php foreach ($class as $key => $value): ?>
	                    		<option value="<?php echo $value['MaLopHoc']; ?>"><?php echo $value['TenLopHoc']; ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                </div>

	                <div class="form-group mb-3">
	                    <label class="form-label">Môn Giảng Dạy</label>
	                    <select id="mabomon" name="mabomon[]" class="form-control monhoc" multiple>
	                    	<?php foreach ($subject as $key => $value): ?>
	                    		<option value="<?php echo $value['MaBoMon']; ?>"><?php echo $value['TenBoMon']; ?></option>
	                    	<?php endforeach ?>
	                    </select>
	                </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
<script src="<?php echo base_url('public/'); ?>admin/plugins/select2/js/select2.full.min.js"></script>

<script>
	$(document).ready(function() {
	    $('.quanhuyen').select2();
	    $('.lophoc').select2();
	    $('.monhoc').select2();
	    $('#matinhthanh').change(function(){
            var matinhthanh = $(this).val();
            $.post("<?php echo base_url('lay-quan-huyen/'); ?>", { matinhthanh }, function(data){
                data = JSON.parse(data);
                
                $("#maquanhuyen").empty();

                if(data.length == 0){
                    
                }else{
                    for(var i = 0; i < data.length; i++){	
                    	$("#maquanhuyen").append('<option value="'+data[i].MaQuanHuyen+'">'+data[i].TenQuanHuyen+'</option>');
                    }
                }
            });
        });
	});
</script>

<script>
    function formatCurrency(input) {
        // Lấy giá trị nhập vào
        let inputVal = input.value;

        // Xóa bỏ các ký tự không phải số
        inputVal = inputVal.replace(/[^\d]/g, '');

        // Định dạng thành kiểu tiền tệ
        inputVal = formatNumber(inputVal);

        // Hiển thị giá trị đã định dạng
        input.value = inputVal;
    }

    function formatNumber(number) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
    }
</script>

<style type="text/css">
	.select2-container--default .select2-selection--multiple {
		border: 1px solid #ced4da;
    	border-radius: 4px;
	}
	.select2-container .select2-selection--multiple {
		min-height: 50px;
	}

	.select2-container--default.select2-container--focus .select2-selection--multiple {
    	border: solid #86b7fe 1px;
	}

	.select2-container--default .select2-selection--multiple .select2-selection__rendered {
		padding-top: 6px;
	}
</style>

