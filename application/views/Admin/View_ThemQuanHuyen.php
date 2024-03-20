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
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vi-tri/'); ?>">Quản Lý Tỉnh Thành</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/vi-tri/'.$tinh[0]['MaTinhThanh'].'/xem/'); ?>"><?php echo $tinh[0]['TenTinhThanh']; ?></a></li>
              <li class="breadcrumb-item active">Thêm Quận Huyện</li>
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
                    <label for="ten">Tỉnh / Thành Phố</label>
                    <input type="text" class="form-control" placeholder="Tỉnh / thành phố" value="<?php echo $tinh[0]['TenTinhThanh']; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="ten">Tên Quận / Huyện</label>
                    <input type="text" class="form-control tenchinh" id="ten" placeholder="Tên quận / huyện" name="tenquanhuyen">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="w-100">
                      <label for="ten">Đường Dẫn</label>
                      <span id="taoduongdan" class="float-right" style="cursor: pointer;">Tạo tự động?</span>
                    </div>
                    <input type="text" class="form-control" id="duongdan" placeholder="Đường dẫn" name="duongdan">
                  </div>
                </div>
              </div> 
              <a class="btn btn-success" href="<?php echo base_url('admin/vi-tri/'); ?>">Quay Lại</a>
              <button class="btn btn-primary">Thêm Quận / Huyện</button>
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
<script>
    function createSlug(str) {
        // Chuyển đổi tiếng Việt thành dạng slug
        str = str.toLowerCase().trim();
        str = str.replace(/\s+/g, '-'); // Thay thế khoảng trắng bằng dấu gạch ngang
        str = convertVietnameseToSlug(str); // Xử lý các dấu tiếng Việt

        return str;
    }

    function convertVietnameseToSlug(str) {
        var slug = str;

        // Xử lý dấu tiếng Việt
        slug = slug.replace(/[áàảãạăắằẳẵặâấầẩẫậ]/g, 'a');
        slug = slug.replace(/[éèẻẽẹêếềểễệ]/g, 'e');
        slug = slug.replace(/[íìỉĩị]/g, 'i');
        slug = slug.replace(/[óòỏõọôốồổỗộơớờởỡợ]/g, 'o');
        slug = slug.replace(/[úùủũụưứừửữự]/g, 'u');
        slug = slug.replace(/[ýỳỷỹỵ]/g, 'y');
        slug = slug.replace(/đ/g, 'd');

        return slug;
    }

    $(document).ready(function(){
        $('#taoduongdan').click(function(){
            if($(".tenchinh").val() == ""){
                toastr.options = {
                  closeButton: true,
                  progressBar: true,
                  positionClass: 'toast-top-right', // Vị trí hiển thị
                  timeOut: 5000 // Thời gian tự động đóng
              };
              toastr.error('Vui lòng nhập tên quận / huyện!', 'Thất Bại');
            }else{
                $("#duongdan").val(createSlug($(".tenchinh").val()))
            }
        })
    });
</script>

