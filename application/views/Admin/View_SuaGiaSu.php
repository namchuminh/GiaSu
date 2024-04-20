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
              <?php if($detail[0]['TrangThai'] == 0){ ?>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/gia-su/cho-duyet/'); ?>">Danh Sách Chờ Duyệt</a></li>
              <?php } ?>
              <li class="breadcrumb-item active"><?php echo $detail[0]['HoTen'] ?></li>
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
                    <input type="text" class="form-control" placeholder="Họ tên gia sư" name="hoten" value="<?php echo $detail[0]['HoTen']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Ngày Sinh</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $detail[0]['NgaySinh']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Giới Tính</label>
                    <select class="form-control" name="gioitinh">
                      <?php if($detail[0]['GioiTinh'] == 1){ ?>
                        <option value="1" selected>Nam</option>
                        <option value="0">Nữ</option>
                      <?php }else{ ?>
                        <option value="1">Nam</option>
                        <option value="0" selected>Nữ</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Chuyên Ngành</label>
                    <input type="text" class="form-control" placeholder="Chuyên ngành của gia sư" name="chuyennganh" value="<?php echo $detail[0]['ChuyenNganh']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Nơi Đào Tạo</label>
                    <input type="text" class="form-control" placeholder="Trường Đại học đang công tác hoặc đã học tập" name="tentruong" value="<?php echo $detail[0]['TenTruong']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Năm Tốt Nghiệp</label>
                    <input type="number" class="form-control" placeholder="Năm tốt nghiệp tại trường" name="namtotnghiep" value="<?php echo $detail[0]['NamTotNghiep']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Chức Vụ</label>
                    <select class="form-control" name="chucvu">
                      <?php if($detail[0]['ChucVu'] == 1){ ?>
                        <option value="0">Sinh Viên</option>
                        <option value="1" selected>Giảng Viên</option>
                      <?php }else{ ?>
                        <option value="0" selected>Sinh Viên</option>
                        <option value="1">Giảng Viên</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại liên hệ" name="sodienthoai" value="<?php echo $detail[0]['SoDienThoai']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Email</label>
                    <input type="email" class="form-control" placeholder="Email liên hệ" name="email" value="<?php echo $detail[0]['Email']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Tỉnh Thành (Nơi Nhận Gia Sư)</label>
                    <select class="form-control" name="tinhthanh">
                      <?php foreach ($tinh as $key => $value): ?>
                        <?php if($value['MaTinhThanh'] == $detail[0]['MaTinhThanh']){ ?>
                          <option value="<?php echo $value['MaTinhThanh']; ?>" selected><?php echo $value['TenTinhThanh']; ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $value['MaTinhThanh']; ?>"><?php echo $value['TenTinhThanh']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ Hiện Tại</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ hiện đang thường trú" name="diachi" value="<?php echo $detail[0]['DiaChi']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Số Buổi Dạy / 1 Tuần</label>
                    <select class="form-control" name="sobuoiday">
                      <option value="1" <?php echo $detail[0]['SoBuoiDay'] == 1 ? "selected" : ""; ?>>1 buổi / tuần</option>
                      <option value="2" <?php echo $detail[0]['SoBuoiDay'] == 2 ? "selected" : ""; ?>>2 buổi / tuần</option>
                      <option value="3" <?php echo $detail[0]['SoBuoiDay'] == 3 ? "selected" : ""; ?>>3 buổi / tuần</option>
                      <option value="4" <?php echo $detail[0]['SoBuoiDay'] == 4 ? "selected" : ""; ?>>4 buổi / tuần</option>
                      <option value="5" <?php echo $detail[0]['SoBuoiDay'] == 5 ? "selected" : ""; ?>>5 buổi / tuần</option>
                      <option value="6" <?php echo $detail[0]['SoBuoiDay'] == 6 ? "selected" : ""; ?>>6 buổi / tuần</option>
                      <option value="7" <?php echo $detail[0]['SoBuoiDay'] == 7 ? "selected" : ""; ?>>7 buổi / tuần</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ten">Lương Tối Thiểu / 1 Tháng</label>
                    <input type="number" class="form-control" placeholder="Lương VND tối thiểu theo tháng" name="luongtoithieu" value="<?php echo $detail[0]['LuongToiThieu']; ?>">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Ảnh Thẻ</label>
                    <input type="file" class="form-control" name="anhthe" onchange="loadFile(event, 'anhthe')">
                  </div>
                  <img id="anhthe" style="width: 150px; height: 170px;" src="<?php echo $detail[0]['AnhThe']; ?>">
                  <br>
                  <br>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Căn Cước Công Dân (Mặt Trước)</label>
                    <input type="file" class="form-control" name="anhcccdmattruoc" onchange="loadFile(event, 'anhcccdmattruoc')">
                  </div>
                  <img id="anhcccdmattruoc" style="width: 350px; height: 250px;" src="<?php echo $detail[0]['AnhCCCDMatTruoc']; ?>">
                  <br>
                  <br>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Căn Cước Công Dân (Mặt Sau)</label>
                    <input type="file" class="form-control" name="anhcccdmatsau" onchange="loadFile(event, 'anhcccdmatsau')">
                  </div>
                  <img id="anhcccdmatsau" style="width: 350px; height: 250px;" src="<?php echo $detail[0]['AnhCCCDMatSau']; ?>">
                  <br>
                  <br>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Bằng Cấp</label>
                    <input type="file" class="form-control" name="anhbangcapsinhvien" onchange="loadFile(event, 'anhbangcapsinhvien')">
                  </div>
                  <img id="anhbangcapsinhvien" style="width: 350px; height: 250px;" src="<?php echo $detail[0]['AnhBangCapSinhVien']; ?>">
                  <br>
                  <br>
                </div>

              </div> 
              
              <?php if($detail[0]['TrangThai'] == 1){ ?>
                <a class="btn btn-success" href="<?php echo base_url('admin/gia-su/'); ?>">Quay Lại</a>
                <button class="btn btn-primary">Cập Nhật Gia Sư</button>
              <?php }else{ ?>
                <a class="btn btn-success" href="<?php echo base_url('admin/gia-su/cho-duyet/'); ?>">Quay Lại</a>
                <a href="<?php echo base_url('admin/gia-su/cho-duyet/'.$detail[0]['MaGiaSu'].'/duyet/') ?>" class="btn btn-primary"><i class="fa-solid fa-check"></i> Duyệt Gia Sư</a>
              <?php } ?>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>

<?php if($detail[0]['TrangThai'] == 1){ ?>

<script type="text/javascript">
  var loadFile = function(event, idLoad) {
      var output = document.getElementById(idLoad);
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
  };
</script>

<?php } ?>