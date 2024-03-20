<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Gia Sư</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/gia-su/'); ?>">Quản Lý Gia Sư</a></li>
              <li class="breadcrumb-item active">Thêm Gia Sư</li>
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Họ Tên</label>
                    <input type="text" class="form-control" placeholder="Họ tên gia sư" name="hoten" value="<?php echo isset($post) ? $post['HoTen'] : '' ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Ngày Sinh</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo isset($post) ? $post['NgaySinh'] : '' ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Giới Tính</label>
                    <select class="form-control" name="gioitinh">
                      <option value="1">Nam</option>
                      <option value="0">Nữ</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Chuyên Ngành</label>
                    <input type="text" class="form-control" placeholder="Chuyên ngành của gia sư" name="chuyennganh" value="<?php echo isset($post) ? $post['ChuyenNganh'] : '' ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Nơi Đào Tạo</label>
                    <input type="text" class="form-control" placeholder="Trường Đại học đang công tác hoặc đã học tập" name="tentruong" value="<?php echo isset($post) ? $post['TenTruong'] : '' ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Năm Tốt Nghiệp</label>
                    <input type="number" class="form-control" placeholder="Năm tốt nghiệp tại trường" name="namtotnghiep" value="<?php echo isset($post) ? $post['NamTotNghiep'] : '' ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Chức Vụ</label>
                    <select class="form-control" name="chucvu">
                      <option value="0">Sinh Viên</option>
                      <option value="1">Giảng Viên</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Tên Đăng Nhập</label>
                    <input type="text" class="form-control" placeholder="Tài khoản đăng nhập" name="taikhoan" value="<?php echo isset($post) ? $post['TaiKhoan'] : '' ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Mật Khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu đăng nhập" name="matkhau" value="<?php echo isset($post) ? $post['MatKhau'] : '' ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại liên hệ" name="sodienthoai" value="<?php echo isset($post) ? $post['SoDienThoai'] : '' ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Email</label>
                    <input type="email" class="form-control" placeholder="Email liên hệ" name="email" value="<?php echo isset($post) ? $post['Email'] : '' ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Ảnh Thẻ</label>
                    <input type="file" class="form-control" name="anhthe">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Căn Cước Công Dân (Mặt Trước)</label>
                    <input type="file" class="form-control" name="anhcccdmattruoc">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Căn Cước Công Dân (Mặt Sau)</label>
                    <input type="file" class="form-control" name="anhcccdmatsau">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Bằng Cấp</label>
                    <input type="file" class="form-control" name="anhbangcapsinhvien">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Tỉnh Thành (Nơi Nhận Gia Sư)</label>
                    <select class="form-control" name="tinhthanh">
                      <?php foreach ($tinh as $key => $value): ?>
                        <option value="<?php echo $value['MaTinhThanh']; ?>"><?php echo $value['TenTinhThanh']; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ Hiện Tại</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ hiện đang thường trú" name="diachi" value="<?php echo isset($post) ? $post['DiaChi'] : '' ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Số Buổi Dạy / 1 Tuần</label>
                    <select class="form-control" name="sobuoiday">
                      <option value="1">1 buổi / tuần</option>
                      <option value="2">2 buổi / tuần</option>
                      <option value="3">3 buổi / tuần</option>
                      <option value="4">4 buổi / tuần</option>
                      <option value="5">5 buổi / tuần</option>
                      <option value="6">6 buổi / tuần</option>
                      <option value="7">7 buổi / tuần</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Lương Tối Thiểu / 1 Tháng</label>
                    <input type="number" class="form-control" placeholder="Lương VND tối thiểu theo tháng" name="luongtoithieu" value="<?php echo isset($post) ? $post['LuongToiThieu'] : '' ?>">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/gia-su/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Thêm Gia Sư</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
