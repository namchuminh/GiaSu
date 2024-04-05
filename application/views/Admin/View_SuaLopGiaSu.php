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
              <li class="breadcrumb-item active"><?php echo $detail[0]['MaLopGiaSu'] ?></li>
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
                        <?php if($value['MaLopHoc'] == $detail[0]['MaLopHoc']){ ?>
                          <option value="<?php echo $value['MaLopHoc']; ?>" selected><?php echo $value['TenLopHoc'] ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $value['MaLopHoc']; ?>"><?php echo $value['TenLopHoc'] ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Môn Học</label>
                    <select class="form-control" name="mabomon">
                      <?php foreach ($bomon as $key => $value): ?>
                        <?php if($value['MaBoMon'] == $detail[0]['MaBoMon']){ ?>
                          <option value="<?php echo $value['MaBoMon']; ?>" selected><?php echo $value['TenBoMon'] ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $value['MaBoMon']; ?>"><?php echo $value['TenBoMon'] ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tỉnh / Thành Phố</label>
                    <select class="form-control" name="matinhthanh">
                      <?php foreach ($tinhthanh as $key => $value): ?>
                        <?php if($value['MaTinhThanh'] == $detail[0]['MaTinhThanh']){ ?>
                          <option value="<?php echo $value['MaTinhThanh']; ?>" selected><?php echo $value['TenTinhThanh'] ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $value['MaTinhThanh']; ?>"><?php echo $value['TenTinhThanh'] ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Quận / Huyện</label>
                    <select class="form-control" name="maquanhuyen">
                      <?php foreach ($quanhuyen as $key => $value): ?>
                        <?php if($value['MaQuanHuyen'] == $detail[0]['MaQuanHuyen']){ ?>
                          <option value="<?php echo $value['MaQuanHuyen']; ?>" selected><?php echo $value['TenQuanHuyen'] ?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $value['MaQuanHuyen']; ?>"><?php echo $value['TenQuanHuyen'] ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" value="<?php echo $detail[0]['DiaChi'] ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" placeholder="Ngày bắt đầu" name="ngaybatdau" value="<?php echo $detail[0]['NgayBatDau'] ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Lương Gia Sư / 1 Tháng</label>
                    <input type="number" class="form-control" placeholder="Lương gia sư / 1 tháng" name="mucluong" value="<?php echo $detail[0]['MucLuong'] ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Yêu Cầu Giới Tính</label>
                    <select class="form-control" name="gioitinh">
                      <option value="1" <?php if($detail[0]['YeuCauGioiTinh'] == 1){ echo "selected"; } ?>>Nam</option>
                      <option value="2" <?php if($detail[0]['YeuCauGioiTinh'] == 2){ echo "selected"; } ?>>Nữ</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Phí Nhận Lớp</label>
                    <input type="number" class="form-control" placeholder="Phí nhận lớp" name="mucphi" value="<?php echo $detail[0]['MucPhi'] ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Buổi Dạy / Tuần</label>
                    <input type="number" class="form-control" placeholder="Số buổi dạy / tuần" name="sobuoi" value="<?php echo $detail[0]['SoBuoi'] ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Thời Gian Dạy</label>
                    <select class="form-control" name="thoigianday">
                      <option value="1" <?php if($detail[0]['ThoiGianDay'] == 1){ echo "selected"; } ?>>Buổi Sáng</option>
                      <option value="2" <?php if($detail[0]['ThoiGianDay'] == 2){ echo "selected"; } ?>>Buổi Trưa</option>
                      <option value="3" <?php if($detail[0]['ThoiGianDay'] == 3){ echo "selected"; } ?>>Buổi Tối</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hình Thức Dạy</label>
                    <select class="form-control" name="hinhthuc">
                      <option value="1" <?php if($detail[0]['HinhThuc'] == 1){ echo "selected"; } ?>>Dạy Tại Nhà</option>
                      <option value="2" <?php if($detail[0]['HinhThuc'] == 2){ echo "selected"; } ?>>Dạy Trực Tuyến</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">SĐT Học Sinh</label>
                    <input type="text" class="form-control" placeholder="SĐT Học Sinh" name="sodienthoai" value="<?php echo $detail[0]['SoDienThoai'] ?>">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/lop-gia-su/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Lớp Gia Sư</button>
              </div> 
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
