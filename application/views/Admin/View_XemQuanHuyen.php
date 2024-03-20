<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Vị Trí</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vi-tri/'); ?>">Quản Lý Vị Trí</a></li>
              <li class="breadcrumb-item active"><?php echo $tinh[0]['TenTinhThanh']; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tỉnh / Thành Phố</th>
                      <th>Quận / Huyện</th>
                      <th>Đường Dẫn</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
                        <td><?php echo $tinh[0]['TenTinhThanh']; ?></td>
	                      <td><?php echo $value['TenQuanHuyen']; ?></td>
	                      <td>
	                      	<a href="<?php echo base_url('quan-huyen/'.$value['DuongDan'].'/'); ?>" target="_blank"><?php echo $value['DuongDan']; ?></a>
	                      </td>
	                      <td>
	                      	<a href="<?php echo base_url('admin/vi-tri/'.$tinh[0]['MaTinhThanh'].'/quan-huyen/'.$value['MaQuanHuyen'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>SỬA</span>
                           	</a>
                           	<a href="<?php echo base_url('admin/vi-tri/'.$tinh[0]['MaTinhThanh'].'/quan-huyen/'.$value['MaQuanHuyen'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
	                      		<i class="fas fa-trash"></i>
                            	<span>XÓA</span>
                           	</a>
	                      </td>
	                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <a class="btn btn-success" href="<?php echo base_url('admin/vi-tri/'); ?>">Quay Lại</a>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php require(APPPATH.'views/admin/layouts/footer.php'); ?>
