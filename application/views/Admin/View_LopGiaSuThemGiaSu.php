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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Lớp Giảng Dạy</label>
                    <select class="form-control" name="malophoc" disabled>
                      <?php foreach ($lophoc as $key => $value): ?>
                        <?php if($value['MaLopHoc'] == $detail[0]['MaLopHoc']){ ?>
                          <option value="<?php echo $value['MaLopHoc']; ?>" selected><?php echo $value['TenLopHoc'] ?></option>
                        <?php }?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Môn Học</label>
                    <select class="form-control" name="mabomon" disabled>
                      <?php foreach ($bomon as $key => $value): ?>
                        <?php if($value['MaBoMon'] == $detail[0]['MaBoMon']){ ?>
                          <option value="<?php echo $value['MaBoMon']; ?>" selected><?php echo $value['TenBoMon'] ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Yêu Cầu Giới Tính</label>
                    <select class="form-control" name="gioitinh" disabled>
                      <option value="1" <?php if($detail[0]['YeuCauGioiTinh'] == 1){ echo "selected"; } ?>>Nam</option>
                      <option value="2" <?php if($detail[0]['YeuCauGioiTinh'] == 2){ echo "selected"; } ?>>Nữ</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Thời Gian Dạy</label>
                    <select class="form-control" name="thoigianday" disabled>
                      <option value="1" <?php if($detail[0]['ThoiGianDay'] == 1){ echo "selected"; } ?>>Buổi Sáng</option>
                      <option value="2" <?php if($detail[0]['ThoiGianDay'] == 2){ echo "selected"; } ?>>Buổi Trưa</option>
                      <option value="3" <?php if($detail[0]['ThoiGianDay'] == 3){ echo "selected"; } ?>>Buổi Tối</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Hình Thức Dạy</label>
                    <select class="form-control" name="hinhthuc" disabled>
                      <option value="1" <?php if($detail[0]['HinhThuc'] == 1){ echo "selected"; } ?>>Dạy Tại Nhà</option>
                      <option value="2" <?php if($detail[0]['HinhThuc'] == 2){ echo "selected"; } ?>>Dạy Trực Tuyến</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Mã Gia Sư</label>
                    <input type="number" class="form-control" placeholder="Nhập mã gia sư để thêm" name="magiasu">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/lop-gia-su/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Thêm Gia Sư Cho Lớp</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<style type="text/css">
  .form-control:disabled, .form-control[readonly] {
    background-color: white;
    opacity: 1;
  }
</style>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
