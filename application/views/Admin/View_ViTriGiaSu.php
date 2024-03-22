<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Khu Vực: <?php echo $detail[0]['TenQuanHuyen']; ?> - <?php echo $thanhpho[0]['TenTinhThanh']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vi-tri/'); ?>">Quản Lý Vị Trí</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vi-tri/'.$thanhpho[0]['MaTinhThanh'].'/xem/'); ?>"><?php echo $thanhpho[0]['TenTinhThanh']; ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vi-tri/'.$thanhpho[0]['MaTinhThanh'].'/quan-huyen/'.$detail[0]['MaQuanHuyen'].'/sua/'); ?>"><?php echo $detail[0]['TenQuanHuyen']; ?></a></li>
              <li class="breadcrumb-item active">Danh Sách Gia Sư</li>
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
                      <th>Ảnh Thẻ</th>
                      <th>Họ Tên</th>
                      <th>Ngày Sinh</th>
                      <th>Giới Tính</th>
                      <th>Khu Vực Gia Sư</th>
                      <th>Chức Vụ</th>
                      <th>Chuyên Ngành</th>
                      <th>Lương Tối Thiểu</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
                        <td><img style="width: 110px; height: 140px" src="<?php echo $value['AnhThe']; ?>"></td>
	                      <td><a href="<?php echo base_url('admin/gia-su/'.$value['MaGiaSu'].'/sua/'); ?>"><?php echo $value['HoTen']; ?></a></td>
                        <td><?php echo date("d/m/Y", strtotime($value['NgaySinh'])); ?></td>
                        <td>
                          <?php echo $value['GioiTinh'] == 1 ? "Nam" : "Nữ"; ?>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('admin/vi-tri/'.$value['MaTinhThanh'].'/xem/'); ?>"><?php echo $value['TenTinhThanh']; ?></a>
	                      </td>
                        <td>
                          <?php echo $value['ChucVu'] == 1 ? "Giảng Viên" : "Sinh Viên"; ?>
                        </td>
                        <td><?php echo $value['ChuyenNganh']; ?></td>
                        <td><?php echo number_format($value['LuongToiThieu']); ?>đ / 1 tháng</td>
	                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <a class="btn btn-success" href="<?php echo base_url('admin/vi-tri/'.$thanhpho[0]['MaTinhThanh'].'/xem/'); ?>">Quay Lại</a>
                <ul class="pagination pagination-sm m-0 float-right">
                	<?php for($i = 1; $i <= $totalPages; $i++){ ?>
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/vi-tri/'.$detail[0]['MaQuanHuyen'].'/gia-su/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
                  	<?php } ?>      
                </ul>
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
