<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GiaSu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_GiaSu');
		$this->load->model('Web/Model_GiaoDien');
		$this->load->model('Web/Model_LopHoc');
		$this->load->model('Web/Model_BoMon');
		$this->load->model('Web/Model_KhuVuc');
		$this->load->model('Web/Model_LopGiaSu');
	}

	public function index()
	{
		$data['title'] = "Danh sách gia sư";
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['class'] = $this->Model_LopHoc->getAll();
		$data['subject'] = $this->Model_BoMon->getAll();
		$data['province'] = $this->Model_KhuVuc->getAll();

		if(isset($_GET['s']) && !empty($_GET['s'])){
			$data['totalPages'] = 0;
			$data['list'] = $this->Model_GiaSu->search($_GET['s']);
			return $this->load->view('Web/View_GiaSu', $data);
		}

		$totalRecords = $this->Model_GiaSu->checkNumber();
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage); 
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_GiaSu->getAll();

		return $this->load->view('Web/View_GiaSu', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách gia sư";
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['class'] = $this->Model_LopHoc->getAll();
		$data['subject'] = $this->Model_BoMon->getAll();
		$data['province'] = $this->Model_KhuVuc->getAll();
		
		$totalRecords = $this->Model_GiaSu->checkNumber();
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('gia-su/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('gia-su/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaSu->getAll();
			return $this->load->view('Web/View_GiaSu', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaSu->getAll($start);
			return $this->load->view('Web/View_GiaSu', $data);
		}
	}

	public function detail($duongdan){
		if(count($this->Model_GiaSu->getBySlug($duongdan)) <= 0){
			$data['title'] = "Không tìm thấy gia sư!";
			return $this->load->view('Web/404', $data);
		}

		$data['title'] = $this->Model_GiaSu->getBySlug($duongdan)[0]['TenSanPham'];
		$data['detail'] = $this->Model_GiaSu->getBySlug($duongdan);
		$data['categoryProduct'] = $this->Model_GiaSu->getByCategory($this->Model_GiaSu->getBySlug($duongdan)[0]['MaChuyenMuc'],$this->Model_GiaSu->getBySlug($duongdan)[0]['MaSanPham']);
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['new'] = $this->Model_GiaSu->getByType(1);
		$data['sale'] = $this->Model_GiaSu->getByType(2);
		$data['popular'] = $this->Model_GiaSu->getByType(3);
		$data['hot'] = $this->Model_GiaSu->getByType(4);
		$data['suggest'] = $this->Model_GiaSu->getSuggest();
		$data['categoryNumber'] = $this->Model_GiaSu->getCategoryNumber();
		$data['tag'] = $this->Model_GiaSu->getTag();
		return $this->load->view('Web/View_ChiTietSanPham', $data);
	}

	public function register(){
		$data['title'] = "Đăng ký làm gia sư";
		$data['province'] = $this->Model_KhuVuc->getAll();
		$data['class'] = $this->Model_LopHoc->getAll();
		$data['subject'] = $this->Model_BoMon->getAll();
		
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$hoten = $this->input->post('hoten');
			$ngaysinh = $this->input->post('ngaysinh');
			$gioitinh = $this->input->post('gioitinh');
			$matinhthanh = $this->input->post('matinhthanh');
			$maquanhuyen = $this->input->post('maquanhuyen');
			$diachi = $this->input->post('diachi');
			$sodienthoai = $this->input->post('sodienthoai');
			$email = $this->input->post('email');
			$chuyennganh = $this->input->post('chuyennganh');
			$chucvu = $this->input->post('chucvu');
			$tentruong = $this->input->post('tentruong');
			$namtotnghiep = $this->input->post('namtotnghiep');
			$luongtoithieu = $this->input->post('luongtoithieu');
			$sobuoiday = $this->input->post('sobuoiday');
			$malophoc = $this->input->post('malophoc');
			$mabomon = $this->input->post('mabomon');

			if(empty($hoten) || empty($diachi) || empty($sodienthoai) || empty($email) || empty($chuyennganh) || empty($tentruong) || empty($namtotnghiep)){
				$data['error'] = "Vui lòng nhập đủ thông tin của bạn!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if (strtotime($ngaysinh) == false) {
				$data['error'] = "Ngày sinh không hợp lệ!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(count($this->Model_KhuVuc->getById($matinhthanh)) <= 0){
				$data['error'] = "Vui lòng chọn Tỉnh thành hợp lệ!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(count($maquanhuyen) <= 0){
				$data['error'] = "Vui lòng chọn quận huyện gia sư!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(($gioitinh != 0) && ($gioitinh != 1)){
				$data['error'] = "Vui lòng chọn giới tính hợp lệ!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			$pattern = '/^(0|\+84)[3|5|7|8|9]\d{8}$/';

			if (!preg_match($pattern, $sodienthoai)) {
			    $data['error'] = "Vui lòng nhập số điện thoại hợp lệ!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			$anhthe = "";	
			$anhcccdmattruoc = "";	
			$anhcccdmatsau = "";	
			$anhbangcapsinhvien = "";	

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhthe')){
				$img = $this->upload->data();
				$anhthe = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh thẻ của gia sư!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if ($this->upload->do_upload('anhcccdmattruoc')){
				$img = $this->upload->data();
				$anhcccdmattruoc = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh CCCD mặt trước!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if ($this->upload->do_upload('anhcccdmatsau')){
				$img = $this->upload->data();
				$anhcccdmatsau = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh CCCD mặt sau!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if ($this->upload->do_upload('anhbangcapsinhvien')){
				$img = $this->upload->data();
				$anhbangcapsinhvien = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn ảnh bằng cấp hoặc thẻ sinh viên!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(($chucvu != 0) && ($chucvu != 1)){
				$data['error'] = "Vui lòng chọn chức danh của bạn!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(!is_numeric($namtotnghiep)){
				$data['error'] = "Năm tốt nghiệp không hợp lệ!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(!is_numeric($sobuoiday)){
				$data['error'] = "Số buổi dạy không hợp lệ!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}else{
				if(($sobuoiday <= 0) || ($sobuoiday > 7)){
					$data['error'] = "Số buổi dạy từ 1 đến 7 buổi / tuần!";
					return $this->load->view('Web/View_LamGiaSu', $data);
				}
			}

			$luongtoithieu = preg_replace('/[^0-9]/', '', $luongtoithieu);

			if(!is_numeric($luongtoithieu) || ($luongtoithieu <= 0)){
				$data['error'] = "Mức lương yêu cầu không hợp lệ!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			if(count($malophoc) <= 0){
				$data['error'] = "Vui lòng chọn lớp giảng dạy!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(count($mabomon) <= 0){
				$data['error'] = "Vui lòng chọn môn học giảng dạy!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}


			if(count($this->Model_GiaSu->getInfoByPhone($sodienthoai)) >= 1){
				$data['error'] = "Số điện thoại gia sư đã tồn tại!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			if(count($this->Model_GiaSu->getInfoByEmail($email)) >= 1){
				$data['error'] = "Email gia sư đã tồn tại!";
				return $this->load->view('Web/View_LamGiaSu', $data);
			}

			$magiasu = $this->Model_GiaSu->add($hoten, $diachi, $ngaysinh, $chucvu, $chuyennganh, $namtotnghiep, $sodienthoai, $email, $luongtoithieu, $anhcccdmattruoc, $anhcccdmatsau, $anhthe, $anhbangcapsinhvien, $sobuoiday, $tentruong, $matinhthanh);

			foreach ($maquanhuyen as $quanhuyen) {
				$this->Model_KhuVuc->insertTutorDistrict($magiasu,$quanhuyen);
			}

			foreach ($malophoc as $lophoc) {
				$this->Model_LopHoc->insertTutorClass($magiasu,$lophoc);
			}

			foreach ($mabomon as $bomon) {
				$this->Model_BoMon->insertTutorSubject($magiasu,$bomon);
			}

			return $this->load->view('Web/View_DangKyGiaSuThanhCong', $data);
		}

		return $this->load->view('Web/View_LamGiaSu', $data);
	}

	public function select($magiasu)
	{
		if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
			$data['title'] = "Không tìm thấy gia sư!";
			return $this->load->view('Web/404', $data);
		}

		$data['title'] = "Thuê gia sư";
		$data['detail'] = $this->Model_GiaSu->getById($magiasu);


		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$malopgiasu = $this->input->post('malopgiasu');
			$malopgiasu = explode("#", $malopgiasu)[1];

			if(count($this->Model_LopGiaSu->getById($malopgiasu)) <= 0){
				$data['error'] = "Mã lớp gia sư không tồn tại!";
				return $this->load->view('Web/View_ChonGiaSu', $data);
			}
			
			$this->Model_LopGiaSu->insertgiasu_lopgiasu($malopgiasu,$magiasu);

			return $this->load->view('Web/View_ChonGiaSuThanhCong', $data);
		}

		return $this->load->view('Web/View_ChonGiaSu', $data);
	}

}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */