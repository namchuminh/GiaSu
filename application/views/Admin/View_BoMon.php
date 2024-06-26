<?php require(APPPATH.'views/admin/layouts/header.php'); ?>
<div class="content-wrapper" style="min-height: 1203.31px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Môn Học</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Quản Lý Môn Học</li>
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
                      <th>Tên Môn Học</th>
                      <th>Tên Lớp Học</th>
                      <th>Đường Dẫn</th>
                      <th>Số Lượng Gia Sư</th>
                      <th>Danh Sách Gia Sư</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($list as $key => $value): ?>
	                    <tr>
	                      <td><?php echo $key + 1; ?></td>
	                      <td><?php echo $value['TenBoMon']; ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/lop-hoc/'.$value['MaLopHoc'].'/sua/'); ?>"><?php echo $value['TenLopHoc']; ?></a>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('mon-hoc/'.$value['DuongDan'].'/'); ?>" target="_blank"><?php echo $value['DuongDan']; ?></a>
	                      </td>
                        <td>
                          <a href="<?php echo base_url('admin/mon-hoc/'.$value['MaBoMon'].'/gia-su/'); ?>"><?php echo count($this->Model_BoMon->getCountGiaSuMonHoc($value['MaBoMon'])); ?> Gia Sư</a>
                        </td>
                        <td>
                          <a class="btn btn-success" href="<?php echo base_url('admin/mon-hoc/'.$value['MaBoMon'].'/gia-su/'); ?>"><i class="fa-solid fa-graduation-cap"></i> DANH SÁCH GIA SƯ</a>
                        </td>
	                      <td>
	                      	<a href="<?php echo base_url('admin/mon-hoc/'.$value['MaBoMon'].'/sua/'); ?>" class="btn btn-primary" style="color: white;">
	                      		<i class="fas fa-edit"></i>
                            	<span>SỬA</span>
                           	</a>
                           	<a href="<?php echo base_url('admin/mon-hoc/'.$value['MaBoMon'].'/xoa/'); ?>" class="btn btn-danger" style="color: white;">
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
                  		<li class="page-item"><a class="page-link" href="<?php echo base_url('admin/mon-hoc/'.$i.'/trang/') ?>"><?php echo $i; ?></a></li>
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
