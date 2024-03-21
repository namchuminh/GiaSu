<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('public/admin/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('public/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
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
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/gia-su/'); ?>">Danh Sách Môn Học</a></li>
              <li class="breadcrumb-item active"><?php echo $detail[0]['HoTen']; ?></li>
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
                    <label for="ten">Họ Tên</label>
                    <input type="text" class="form-control" value="<?php echo $detail[0]['HoTen']; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Ngày Sinh</label>
                    <input type="text" class="form-control" value="<?php echo date("d/m/Y", strtotime($detail[0]['NgaySinh'])); ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Giới Tính</label>
                    <input type="text" class="form-control" value="<?php echo $detail[0]['GioiTinh'] == 1 ? "Nam" : "Nữ"; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Chức Vụ</label>
                    <input type="text" class="form-control" value="<?php echo $detail[0]['ChucVu'] == 1 ? "Giảng Viên" : "Sinh Viên"; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Chuyên Nghành</label>
                    <input type="text" class="form-control" value="<?php echo $detail[0]['ChuyenNganh']; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Lớp Học Giảng Dạy</label>
                    <div class="select2-purple">
                      <select class="select2" multiple="multiple" data-placeholder="Chọn môn giảng dạy" data-dropdown-css-class="select2-purple" style="width: 100%;" name="mon[]">
                        <?php foreach ($mon as $key => $value): ?>
                          <?php if(count($this->Model_BoMon->getGiaSuBoMon($detail[0]['MaGiaSu'],$value['MaBoMon'])) >= 1){ ?>
                            <option value="<?php echo $value['MaBoMon'] ?>" selected><?php echo $value['TenBoMon'] ?></option>
                          <?php }else{ ?>
                            <option value="<?php echo $value['MaBoMon'] ?>"><?php echo $value['TenBoMon'] ?></option>
                          <?php } ?>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div> 
              </div>
              <a class="btn btn-success" href="<?php echo base_url('admin/gia-su/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Cập Nhật Môn Giảng Dạy</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<style type="text/css">
  .form-control:disabled, .form-control[readonly]{
    background-color: unset;
    opacity: 1;
  }
</style>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>

<script src="<?php echo base_url('public/admin/plugins/select2/js/select2.full.min.js') ?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>