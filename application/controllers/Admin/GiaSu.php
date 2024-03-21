<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GiaSu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_GiaSu');
		$this->load->model('Admin/Model_LopHoc');
		$this->load->model('Admin/Model_BoMon');
		$this->load->model('Admin/Model_ViTri');
		$this->load->model('Admin/Model_GiaSu');
	}

	public function index()
	{
		$totalRecords = $this->Model_GiaSu->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_GiaSu->getAll();
		$data['title'] = "Quản lý danh sách gia sư";
		$data['choduyet'] = count($this->Model_GiaSu->getAllAccept(0,1000));
		return $this->load->view('Admin/View_GiaSu', $data);
	}

	public function page($trang){
		$data['title'] = "Quản lý danh sách gia sư";
		$totalRecords = $this->Model_GiaSu->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 
		$data['choduyet'] = count($this->Model_GiaSu->getAllAccept(0,1000));
		if($trang < 1){
			return redirect(base_url('admin/gia-su/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/gia-su/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaSu->getAll();
			return $this->load->view('Admin/View_GiaSu', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaSu->getAll($start);
			return $this->load->view('Admin/View_GiaSu', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm gia sư vào hệ thống";
		$data['tinh'] = $this->Model_ViTri->getAll(0,1000);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$HoTen = $this->input->post('hoten');
			$NgaySinh = $this->input->post('ngaysinh');
			$GioiTinh = $this->input->post('gioitinh');
			$ChuyenNganh = $this->input->post('chuyennganh');
			$TenTruong = $this->input->post('tentruong');
			$NamTotNghiep = $this->input->post('namtotnghiep');
			$ChucVu = $this->input->post('chucvu');
			$TaiKhoan = $this->input->post('taikhoan');
			$MatKhau = $this->input->post('matkhau');
			$SoDienThoai = $this->input->post('sodienthoai');
			$Email = $this->input->post('email');
			$AnhThe = "";
			$AnhCCCDMatTruoc = "";
			$AnhCCCDMatSau = "";
			$AnhBangCapSinhVien = "";
			$MaTinhThanh = $this->input->post('tinhthanh');
			$DiaChi = $this->input->post('diachi');
			$SoBuoiDay = $this->input->post('sobuoiday');
			$LuongToiThieu = $this->input->post('luongtoithieu');

			$data['post'] = array(
				'HoTen' => $HoTen,
				'NgaySinh' => $NgaySinh,
				'GioiTinh' => $GioiTinh,
				'ChuyenNganh' => $ChuyenNganh,
				'TenTruong' => $TenTruong,
				'NamTotNghiep' => $NamTotNghiep,
				'TaiKhoan' => $TaiKhoan,
				'SoDienThoai' => $SoDienThoai,
				'Email' => $Email,
				'DiaChi' => $DiaChi,
				'SoBuoiDay' => $SoBuoiDay,
				'LuongToiThieu' => $LuongToiThieu,
				'MatKhau' => $MatKhau,
			);

			if(empty($HoTen) || empty($NgaySinh) || empty($ChuyenNganh) || empty($TenTruong) || empty($NamTotNghiep) || empty($TaiKhoan) || empty($MatKhau) || empty($SoDienThoai) || empty($Email) || empty($DiaChi)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if(($GioiTinh != 1) && ($GioiTinh != 0)){
				$data['error'] = "Giới tình phải là Nam hoặc Nữ!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if(($ChucVu != 1) && ($ChucVu != 0)){
				$data['error'] = "Chức vụ phải là Giảng Viên hoặc Sinh Viên!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $SoDienThoai)) {
			    $data['error'] = "Vui lòng nhập số điện thoại hợp lệ!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $Email)) {
				$data['error'] = "Vui lòng nhập Email hợp lệ!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
    		}

			if(count($this->Model_ViTri->getById($MaTinhThanh)) <= 0){
				$data['error'] = "Tỉnh thành không tồn tại trong hệ thống!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if(!is_numeric($SoBuoiDay) || ($SoBuoiDay <= 0) || ($SoBuoiDay > 7)){
				$data['error'] = "Số buổi dạy từ 1 đến 7 buổi / 1 tuần!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if(!is_numeric($LuongToiThieu) || ($LuongToiThieu <= 0)){
				$data['error'] = "Lương tối thiểu phải là một số lớn hơn 0!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}


			if(count($this->Model_GiaSu->getInfoByUsername($TaiKhoan)) >= 1){
				$data['error'] = "Tài khoản gia sư đã tồn tại!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if(count($this->Model_GiaSu->getInfoByPhone($SoDienThoai)) >= 1){
				$data['error'] = "Số điện thoại gia sư đã tồn tại!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if(count($this->Model_GiaSu->getInfoByEmail($Email)) >= 1){
				$data['error'] = "Email gia sư đã tồn tại!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhthe')){
				$img = $this->upload->data();
				$AnhThe = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh thẻ của gia sư!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if ($this->upload->do_upload('anhcccdmattruoc')){
				$img = $this->upload->data();
				$AnhCCCDMatTruoc = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh CCCD mặt trước của gia sư!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if ($this->upload->do_upload('anhcccdmatsau')){
				$img = $this->upload->data();
				$AnhCCCDMatSau = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh CCCD mặt sau của gia sư!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}

			if ($this->upload->do_upload('anhbangcapsinhvien')){
				$img = $this->upload->data();
				$AnhBangCapSinhVien = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh bằng cấp của gia sư!";
				return $this->load->view('Admin/View_ThemGiaSu', $data);
			}


			$this->Model_GiaSu->add($HoTen,$DiaChi,$NgaySinh,$ChucVu,$ChuyenNganh,$NamTotNghiep,$SoDienThoai,$Email,$TaiKhoan,md5($MatKhau),$LuongToiThieu,$AnhCCCDMatTruoc,$AnhCCCDMatSau,$AnhThe,$AnhBangCapSinhVien,$SoBuoiDay,$TenTruong,$MaTinhThanh);

			$this->session->set_flashdata('success', 'Thêm gia sư thành công!');
			return redirect(base_url('admin/gia-su/'));
		}
		return $this->load->view('Admin/View_ThemGiaSu', $data);
	}


	public function update($magiasu)
	{
		if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
			$this->session->set_flashdata('error', 'Gia sư không tồn tại!');
			return redirect(base_url('admin/gia-su/'));
		}

		$data['title'] = "Cập nhật thông tin gia sư";
		$data['detail'] = $this->Model_GiaSu->getById($magiasu);
		$data['tinh'] = $this->Model_ViTri->getAll(0,1000);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$HoTen = $this->input->post('hoten');
			$NgaySinh = $this->input->post('ngaysinh');
			$GioiTinh = $this->input->post('gioitinh');
			$ChuyenNganh = $this->input->post('chuyennganh');
			$TenTruong = $this->input->post('tentruong');
			$NamTotNghiep = $this->input->post('namtotnghiep');
			$ChucVu = $this->input->post('chucvu');
			$TaiKhoan = $this->Model_GiaSu->getById($magiasu)[0]['TaiKhoan'];
			$MatKhau = $this->Model_GiaSu->getById($magiasu)[0]['MatKhau'];
			$SoDienThoai = $this->input->post('sodienthoai');
			$Email = $this->input->post('email');
			$AnhThe = $this->Model_GiaSu->getById($magiasu)[0]['AnhThe'];
			$AnhCCCDMatTruoc = $this->Model_GiaSu->getById($magiasu)[0]['AnhCCCDMatTruoc'];
			$AnhCCCDMatSau = $this->Model_GiaSu->getById($magiasu)[0]['AnhCCCDMatSau'];
			$AnhBangCapSinhVien = $this->Model_GiaSu->getById($magiasu)[0]['AnhBangCapSinhVien'];
			$MaTinhThanh = $this->input->post('tinhthanh');
			$DiaChi = $this->input->post('diachi');
			$SoBuoiDay = $this->input->post('sobuoiday');
			$LuongToiThieu = $this->input->post('luongtoithieu');

			if(empty($HoTen) || empty($NgaySinh) || empty($ChuyenNganh) || empty($TenTruong) || empty($NamTotNghiep) || empty($SoDienThoai) || empty($Email) || empty($DiaChi)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
			}

			if(($GioiTinh != 1) && ($GioiTinh != 0)){
				$data['error'] = "Giới tính phải là Nam hoặc Nữ!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
			}

			if(($ChucVu != 1) && ($ChucVu != 0)){
				$data['error'] = "Chức vụ phải là Giảng Viên hoặc Sinh Viên!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
			}

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $SoDienThoai)) {
			    $data['error'] = "Vui lòng nhập số điện thoại hợp lệ!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
			}

			if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $Email)) {
				$data['error'] = "Vui lòng nhập Email hợp lệ!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
    		}

			if(count($this->Model_ViTri->getById($MaTinhThanh)) <= 0){
				$data['error'] = "Tỉnh thành không tồn tại trong hệ thống!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
			}

			if(!is_numeric($SoBuoiDay) || ($SoBuoiDay <= 0) || ($SoBuoiDay > 7)){
				$data['error'] = "Số buổi dạy từ 1 đến 7 buổi / 1 tuần!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
			}

			if(!is_numeric($LuongToiThieu) || ($LuongToiThieu <= 0)){
				$data['error'] = "Lương tối thiểu phải là một số lớn hơn 0!";
				return $this->load->view('Admin/View_SuaGiaSu', $data);
			}


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhthe')){
				$img = $this->upload->data();
				$AnhThe = base_url('uploads')."/".$img['file_name'];
			}

			if ($this->upload->do_upload('anhcccdmattruoc')){
				$img = $this->upload->data();
				$AnhCCCDMatTruoc = base_url('uploads')."/".$img['file_name'];
			}

			if ($this->upload->do_upload('anhcccdmatsau')){
				$img = $this->upload->data();
				$AnhCCCDMatSau = base_url('uploads')."/".$img['file_name'];
			}

			if ($this->upload->do_upload('anhbangcapsinhvien')){
				$img = $this->upload->data();
				$AnhBangCapSinhVien = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_GiaSu->update($HoTen,$DiaChi,$NgaySinh,$ChucVu,$ChuyenNganh,$NamTotNghiep,$SoDienThoai,$Email,$TaiKhoan,$MatKhau,$LuongToiThieu,$AnhCCCDMatTruoc,$AnhCCCDMatSau,$AnhThe,$AnhBangCapSinhVien,$SoBuoiDay,$TenTruong,$MaTinhThanh);

			$data['success'] = "Cập nhật thông tin gia sư thành công!";
			$data['detail'] = $this->Model_GiaSu->getById($magiasu);
			return $this->load->view('Admin/View_SuaGiaSu', $data);
		}

		return $this->load->view('Admin/View_SuaGiaSu', $data);
	}

	public function viewAccept(){
		if(count($this->Model_GiaSu->getAllAccept(0,1000)) <= 0){
			$this->session->set_flashdata('error', 'Danh sách chờ duyệt hiện đang trống!');
			return redirect(base_url('admin/gia-su/'));
		}

		$totalRecords = $this->Model_GiaSu->checkNumberAccept();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_GiaSu->getAllAccept();
		$data['title'] = "Quản lý danh sách gia sư đang chờ duyệt";
		return $this->load->view('Admin/View_GiaSuChoDuyet', $data);
	}

	public function pageAccept($trang){
		if(count($this->Model_GiaSu->getAllAccept(0,1000)) <= 0){
			$this->session->set_flashdata('error', 'Danh sách chờ duyệt hiện đang trống!');
			return redirect(base_url('admin/gia-su/'));
		}

		$data['title'] = "Quản lý danh sách gia sư chờ đang chờ duyệt";
		$totalRecords = $this->Model_GiaSu->checkNumberAccept();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/gia-su/cho-duyet/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/gia-su/cho-duyet/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaSu->getAllAccept();
			return $this->load->view('Admin/View_GiaSuChoDuyet', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaSu->getAllAccept($start);
			return $this->load->view('Admin/View_GiaSuChoDuyet', $data);
		}
	}

	public function accept($magiasu){
		if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
			$this->session->set_flashdata('error', 'Gia sư không tồn tại!');
			return redirect(base_url('admin/gia-su/cho-duyet/'));
		}

		$this->Model_GiaSu->accept($magiasu);

		$this->session->set_flashdata('success', 'Đã duyệt gia sư vào hệ thống!');
		return redirect(base_url('admin/gia-su/'));
	}

	public function delete($magiasu)
	{
		if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
			$this->session->set_flashdata('error', 'Gia sư không tồn tại!');
			return redirect(base_url('admin/gia-su/'));
		}

		$this->Model_GiaSu->delete($magiasu);

		if($this->Model_GiaSu->getById($magiasu)[0]['TrangThai'] == 1){
			$this->session->set_flashdata('success', 'Xóa gia sư thành công!');
			return redirect(base_url('admin/gia-su/'));
		}else{
			$this->session->set_flashdata('success', 'Xóa gia sư thành công!');
			return redirect(base_url('admin/gia-su/cho-duyet/'));
		}
	}

	public function class($magiasu){
		if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
			$this->session->set_flashdata('error', 'Gia sư không tồn tại!');
			return redirect(base_url('admin/gia-su/'));
		}

		$data['title'] = "Danh sách lớp gia sư đảm nhiệm";
		$data['detail'] = $this->Model_GiaSu->getById($magiasu);
		$data['lop'] = $this->Model_LopHoc->getAll(0,1000);

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$lop = $this->input->post('lop');
			$this->Model_LopHoc->deleteGiaSuLopHoc($magiasu);

			if(empty($lop) || (count($lop) <= 0)){
				$data['success'] = "Cập nhật lớp giảng dạy cho gia sư thành công!";
	        	return $this->load->view('Admin/View_GiaSuLop', $data);
			}

			foreach ($lop as $malophoc) {
	            $this->Model_LopHoc->insertGiaSuLopHoc($malophoc, $magiasu);
	        }

	        $data['success'] = "Cập nhật lớp giảng dạy cho gia sư thành công!";
	        return $this->load->view('Admin/View_GiaSuLop', $data);
		}

		return $this->load->view('Admin/View_GiaSuLop', $data);
	}

	public function subject($magiasu){
		if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
			$this->session->set_flashdata('error', 'Gia sư không tồn tại!');
			return redirect(base_url('admin/gia-su/'));
		}

		$data['title'] = "Danh sách môn học gia sư đảm nhiệm";
		$data['detail'] = $this->Model_GiaSu->getById($magiasu);
		$data['mon'] = $this->Model_BoMon->getAll(0,1000);

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$mon = $this->input->post('mon');
			$this->Model_BoMon->deleteGiaSuBoMon($magiasu);

			if(empty($mon) || (count($mon) <= 0)){
				$data['success'] = "Cập nhật môn học giảng dạy cho gia sư thành công!";
	        	return $this->load->view('Admin/View_GiaSuMon', $data);
			}

			foreach ($mon as $mabomon) {
	            $this->Model_BoMon->insertGiaSuBoMon($mabomon, $magiasu);
	        }

	        $data['success'] = "Cập nhật môn học giảng dạy cho gia sư thành công!";
	        return $this->load->view('Admin/View_GiaSuMon', $data);
		}

		return $this->load->view('Admin/View_GiaSuMon', $data);
	}

	public function location($magiasu){
		if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
			$this->session->set_flashdata('error', 'Gia sư không tồn tại!');
			return redirect(base_url('admin/gia-su/'));
		}

		$data['title'] = "Danh sách khu vực gia sư đảm nhiệm";
		$data['detail'] = $this->Model_GiaSu->getById($magiasu);
		$data['vitri'] = $this->Model_ViTri->getById($this->Model_GiaSu->getById($magiasu)[0]['MaTinhThanh']);
		$data['quanhuyen'] = $this->Model_ViTri->getQuanHuyen($this->Model_GiaSu->getById($magiasu)[0]['MaTinhThanh']);

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$vitri = $this->input->post('vitri');
			$this->Model_ViTri->deleteGiaSuViTri($magiasu);

			if(empty($vitri) || (count($vitri) <= 0)){
				$data['success'] = "Cập nhật khu vực giảng dạy cho gia sư thành công!";
	        	return $this->load->view('Admin/View_GiaSuViTri', $data);
			}

			foreach ($vitri as $maquanhuyen) {
	            $this->Model_ViTri->insertGiaSuViTri($maquanhuyen, $magiasu);
	        }

	        $data['success'] = "Cập nhật khu vực giảng dạy cho gia sư thành công!";
	        return $this->load->view('Admin/View_GiaSuViTri', $data);
		}

		return $this->load->view('Admin/View_GiaSuViTri', $data);
	}
}

/* End of file GiaSu.php */
/* Location: ./application/controllers/GiaSu.php */