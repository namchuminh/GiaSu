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
              <li class="breadcrumb-item active">Quản Lý Lớp Gia Sư</li>
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
                      <th>Lớp Học</th>
                      <th>Môn Học</th>
                      <th style="width: 250px;">Địa Chỉ</th>
                      <th>Lương Gia Sư</th>
                      <th>Phí Nhận Lớp</th>
                      <th>Số Buổi / Tuần</th>
                      <th>SĐT Học Sinh</th>
                      <th>Thêm Gia Sư</th>
                      <th>Danh Sách Gia Sư</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td><a href="<?php echo base_url('admin/lop-gia-su/'.$value['MaLopHoc'].'/sua/'); ?>"><?php echo $value['TenLopHoc']; ?></a></td>
	                      <td>
	                      	<a href="<?php echo base_url('mon-hoc/'.$value['MaBoMon'].'/sua/'); ?>"><?php echo $value['TenBoMon']; ?></a>
	                      </td>
                        <td>
                          <?php echo $value['DiaChi']; ?>, <?php echo $value['TenQuanHuyen']; ?>, <?php echo $value['TenTinhThanh']; ?>
                        </td>
                        <td>
                          <?php echo number_format($value['MucLuong']); ?> VND
                        </td>
                        <td>
                          <?php echo number_format($value['MucPhi']); ?> VND
                        </td>
                        <td>
                          <?php echo $value['SoBuoi']; ?> Buổi / 1 Tuần
                        </td>
                        <td>
                          <?php echo $value['SoDienThoai']; ?>
                        </td>
                        <td>
                          <a class="btn btn-success" href="<?php echo base_url('admin/lop-gia-su/'.$value['MaLopGiaSu'].'/them-gia-su/'); ?>"><i class="fa-solid fa-graduation-cap"></i> THÊM GIA SƯ</a>
                        </td>
                        <td>
                          <a class="btn btn-success" href="<?php echo base_url('admin/lop-gia-su/'.$value['MaLopGiaSu'].'/gia-su/'); ?>"><i class="fa-solid fa-graduation-cap"></i> DS GIA SƯ</a>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('admin/lop-gia-su/'.$value['MaLopGiaSu'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>XEM CHI TIẾT</span>
                           	</a>
                            <br>
                            <br>
                           	<a href="<?php echo base_url('admin/lop-gia-su/'.$value['MaLopGiaSu'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
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
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/lop-gia-su/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
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
