<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Cấu Hình</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/cau-hinh/'); ?>">Quản Lý Cấu Hình</a></li>
              <li class="breadcrumb-item active">Cập Nhật Cấu Hình</li>
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
                    <label for="ten">Tên Website</label>
                    <input type="text" class="form-control" placeholder="Tên website" name="tenwebsite" value="<?php echo $detail[0]['TenWebsite']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Mô Tả Website</label>
                    <textarea class="form-control" rows="3" placeholder="Mô tả website" name="motaweb"><?php echo $detail[0]['MoTaWeb']; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Logo Website</label>
                    <input type="file" class="form-control" id="ten" name="logo">
                  </div>
                  <br>
                  <img style="width: 120px; height: 100px;" src="<?php echo $detail[0]['Logo']; ?>">
                  <br>
                  <br>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" value="<?php echo $detail[0]['DiaChi']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $detail[0]['Email']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Số Điện Thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" name="sodienthoai" value="<?php echo $detail[0]['SoDienThoai']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Mức Phí Gia Sư Nhận Lớp (%)</label>
                    <input type="number" class="form-control" placeholder="Mức phí % khi gia sư nhận lớp" name="mucphi" value="<?php echo $detail[0]['MucPhi']; ?>">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Lưu Cấu Hình</button>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
