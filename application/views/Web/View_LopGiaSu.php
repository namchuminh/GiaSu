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
        <form class="row" method="post">
            <div class="col-md-6">
                <div class="heading_s1">
                    <h4>Thông Tin Liên Hệ & Giảng Dạy</h4>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tỉnh / Thành Phố</label>
                    <select id="matinhthanh" name="matinhthanh" class="form-control">
                        <option hidden>Chọn Tỉnh Thành</option>
                        <?php foreach ($province as $key => $value): ?>
                            <option value="<?php echo $value['MaTinhThanh']; ?>"><?php echo $value['TenTinhThanh']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Quận / Huyện</label>
                    <select id="maquanhuyen" name="maquanhuyen" class="form-control">
                        <option hidden>Chọn Quận Huyện</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Địa Chỉ Cụ Thể</label>
                    <input type="text" name="diachi" class="form-control" placeholder="Địa Chỉ Để Gia Sư Đến Dạy *">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Lớp Học</label>
                    <select id="malophoc" name="malophoc" class="form-control">
                        <option hidden>Chọn Lớp Học</option>
                        <?php foreach ($class as $key => $value): ?>
                            <option value="<?php echo $value['MaLopHoc']; ?>"><?php echo $value['TenLopHoc']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Môn Học</label>
                    <select id="mabomon" name="mabomon" class="form-control">
                        <option hidden>Chọn Môn Học</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Số Điện Thoại</label>
                    <input type="number" name="sodienthoai" class="form-control" placeholder="Số Điện Thoại Người Thuê *">
                </div>
                <button type="submit" class="btn btn-fill-out btn-block">Đăng Ký Thuê Gia Sư</button>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Yêu Cầu Thông Tin Gia Sư</h4>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Mức Lương</label>
                        <input type="text" name="mucluong" class="form-control" placeholder="Mức Lương Theo Tháng *">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Yêu Cầu Giới Tính</label>
                        <select name="yeucaugioitinh" class="form-control">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Số Buổi Dạy / Tuần</label>
                        <input type="sobuoi" name="mucluong" class="form-control" placeholder="Số Buổi Dạy Trong 1 Tuần *">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Thời Gian Dạy</label>
                        <select name="thoigianday" class="form-control">
                            <option value="1">Buổi Sáng</option>
                            <option value="2">Buổi Chiều</option>
                            <option value="3">Buổi Tối</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Hình Thức Dạy</label>
                        <select name="hinhthuc" class="form-control">
                            <option value="1">Dạy Tại Nhà</option>
                            <option value="2">Dạy Trực Tuyến</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Ngày Bắt Đầu</label>
                        <input type="date" name="ngaybatdau" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require(APPPATH.'views/web/layouts/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#matinhthanh').change(function(){
            var matinhthanh = $(this).val();
            $.post("<?php echo base_url('lay-quan-huyen/'); ?>", { matinhthanh }, function(data){
                data = JSON.parse(data);
                
                $("#maquanhuyen").empty();

                if(data.length == 0){
                    $("#maquanhuyen").append('<option hidden>Không Có Quận Huyện!</option>');
                }else{
                    for(var i = 0; i < data.length; i++){
                        $("#maquanhuyen").append('<option value"'+data[i].MaQuanHuyen+'">'+data[i].TenQuanHuyen+'</option>');
                    }
                }
            });
        });

        $('#malophoc').change(function(){
            var malophoc = $(this).val();
            $.post("<?php echo base_url('lay-mon-hoc/'); ?>", { malophoc }, function(data){
                data = JSON.parse(data);
                
                $("#mabomon").empty();

                if(data.length == 0){
                    $("#mabomon").append('<option hidden>Không Có Môn Học!</option>');
                }else{
                    for(var i = 0; i < data.length; i++){
                        $("#mabomon").append('<option value"'+data[i].MaBoMon+'">'+data[i].TenBoMon+'</option>');
                    }
                }
            });
        });
    });
</script>