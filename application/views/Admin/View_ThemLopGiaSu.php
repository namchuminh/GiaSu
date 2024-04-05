<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Lớp Gia Sư</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/lop-gia-su/'); ?>">Quản Lý Lớp Gia Sư</a></li>
              <li class="breadcrumb-item active">Thêm Lớp Gia Sư</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Lớp Giảng Dạy</label>
                    <select class="form-control" name="malophoc">
                      <?php foreach ($lophoc as $key => $value): ?>
                        <option value="<?php echo $value['MaLopHoc']; ?>"><?php echo $value['TenLopHoc'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Môn Học</label>
                    <select class="form-control" name="mabomon">
                      <?php foreach ($bomon as $key => $value): ?>
                        <option value="<?php echo $value['MaBoMon']; ?>"><?php echo $value['TenBoMon'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tỉnh / Thành Phố</label>
                    <select class="form-control" name="matinhthanh">
                      <?php foreach ($tinhthanh as $key => $value): ?>
                        <option value="<?php echo $value['MaTinhThanh']; ?>"><?php echo $value['TenTinhThanh'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Quận / Huyện</label>
                    <select class="form-control" name="maquanhuyen">
                      <?php foreach ($quanhuyen as $key => $value): ?>
                        <option value="<?php echo $value['MaQuanHuyen']; ?>"><?php echo $value['TenQuanHuyen'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" placeholder="Ngày bắt đầu" name="ngaybatdau">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Lương Gia Sư / 1 Tháng</label>
                    <input type="number" class="form-control" placeholder="Lương gia sư / 1 tháng" name="mucluong">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Yêu Cầu Giới Tính</label>
                    <select class="form-control" name="gioitinh">
                      <option value="1">Nam</option>
                      <option value="2">Nữ</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Phí Nhận Lớp</label>
                    <input type="number" class="form-control" placeholder="Phí nhận lớp" name="mucphi">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Buổi Dạy / Tuần</label>
                    <input type="number" class="form-control" placeholder="Số buổi dạy / tuần" name="sobuoi">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Thời Gian Dạy</label>
                    <select class="form-control" name="thoigianday">
                      <option value="1">Buổi Sáng</option>
                      <option value="2">Buổi Trưa</option>
                      <option value="3">Buổi Tối</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hình Thức Dạy</label>
                    <select class="form-control" name="hinhthuc">
                      <option value="1">Dạy Tại Nhà</option>
                      <option value="2">Dạy Trực Tuyến</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">SĐT Học Sinh</label>
                    <input type="text" class="form-control" placeholder="SĐT Học Sinh" name="sodienthoai">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/lop-gia-su/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Thêm Lớp Gia Sư</button>
              </div> 
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
<script>
    function createSlug(str) {
        // Chuyển đổi tiếng Việt thành dạng slug
        str = str.toLowerCase().trim();
        str = str.replace(/\s+/g, '-'); // Thay thế khoảng trắng bằng dấu gạch ngang
        str = convertVietnameseToSlug(str); // Xử lý các dấu tiếng Việt

        return str;
    }

    function convertVietnameseToSlug(str) {
        var slug = str;

        // Xử lý dấu tiếng Việt
        slug = slug.replace(/[áàảãạăắằẳẵặâấầẩẫậ]/g, 'a');
        slug = slug.replace(/[éèẻẽẹêếềểễệ]/g, 'e');
        slug = slug.replace(/[íìỉĩị]/g, 'i');
        slug = slug.replace(/[óòỏõọôốồổỗộơớờởỡợ]/g, 'o');
        slug = slug.replace(/[úùủũụưứừửữự]/g, 'u');
        slug = slug.replace(/[ýỳỷỹỵ]/g, 'y');
        slug = slug.replace(/đ/g, 'd');

        return slug;
    }

    $(document).ready(function(){
        $('#taoduongdan').click(function(){
            if($(".tenchinh").val() == ""){
                toastr.options = {
	                closeButton: true,
	                progressBar: true,
	                positionClass: 'toast-top-right', // Vị trí hiển thị
	                timeOut: 5000 // Thời gian tự động đóng
	            };
	            toastr.error('Vui lòng nhập tên Lớp Gia Sư!', 'Thất Bại');
            }else{
                $("#duongdan").val(createSlug($(".tenchinh").val()))
            }
        })
    });
</script>