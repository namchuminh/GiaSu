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
              <li class="breadcrumb-item active">Quản Lý Gia Sư</li>
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
              <div class="card-header">
                <div class="text-right">
                  <a href="<?php echo base_url('admin/gia-su/cho-duyet/'); ?>" class="btn btn-success">DANH SÁCH CHỜ DUYỆT (<?php echo $choduyet; ?>)</a>
                </div>
              </div>
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
                      <th>Thông Tin Gia Sư</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
                        <td><img style="width: 100px; height: 100px" src="<?php echo $value['AnhThe']; ?>"></td>
	                      <td><?php echo $value['HoTen']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['NgaySinh'])); ?></td>
                        <td>
                          <?php echo $value['GioiTinh'] == 1 ? "Nam" : "Nữ"; ?>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('mon-hoc/'.$value['MaTinhThanh'].'/'); ?>"><?php echo $value['TenTinhThanh']; ?></a>
	                      </td>
                        <td>
                          <?php echo $value['ChucVu'] == 1 ? "Giảng Viên" : "Sinh Viên"; ?>
                        </td>
                        <td><?php echo $value['ChuyenNganh']; ?></td>
                        <td><?php echo number_format($value['LuongToiThieu']); ?>đ / 1 tháng</td>
                        <td>
                          <a class="btn btn-success" href="<?php echo base_url('admin/gia-su/'.$value['MaGiaSu'].'/lop/'); ?>"><i class="nav-icon fa-solid fa-clipboard"></i> LỚP GIẢNG DẠY</a>
                          <hr>
                          <a class="btn btn-secondary" href="<?php echo base_url('admin/gia-su/'.$value['MaGiaSu'].'/mon/'); ?>"><i class="nav-icon fa-solid fa-book"></i> MÔN GIẢNG DẠY</a>
                          <hr>
                          <a class="btn btn-info" href="<?php echo base_url('admin/gia-su/'.$value['MaGiaSu'].'/vi-tri/'); ?>"><i class="nav-icon fa-solid fa-location-dot"></i> KHU VỰC GIA SƯ</a>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('admin/gia-su/'.$value['MaGiaSu'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>SỬA</span>
                           	</a>
                            <hr>
                           	<a href="<?php echo base_url('admin/gia-su/'.$value['MaGiaSu'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
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
                <ul class="pagination pagination-sm m-0 float-right">
                	<?php for($i = 1; $i <= $totalPages; $i++){ ?>
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/gia-su/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
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
