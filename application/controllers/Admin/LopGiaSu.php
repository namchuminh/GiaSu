<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LopGiaSu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_LopGiaSu');
		$this->load->model('Admin/Model_LopHoc');
		$this->load->model('Admin/Model_ViTri');
		$this->load->model('Admin/Model_BoMon');
		$this->load->model('Admin/Model_GiaSu');
	}

	public function index()
	{
		$totalRecords = $this->Model_LopGiaSu->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_LopGiaSu->getAll();
		$data['title'] = "Quản lý lớp gia sư";
		return $this->load->view('Admin/View_LopGiaSu', $data);
	}

	public function page($trang){
		$data['title'] = "Quản lý lớp gia sư";
		$totalRecords = $this->Model_LopGiaSu->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/lop-gia-su/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/lop-gia-su/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LopGiaSu->getAll();
			return $this->load->view('Admin/View_LopGiaSu', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LopGiaSu->getAll($start);
			return $this->load->view('Admin/View_LopGiaSu', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm lớp học gia sư";
		$data['lophoc'] = $this->Model_LopHoc->getAllAdd();
		$data['bomon'] = $this->Model_BoMon->getAllAdd();
		$data['quanhuyen'] = $this->Model_ViTri->getAllQuanHuyenAdd();
		$data['tinhthanh'] = $this->Model_ViTri->getAllTinhThanhAdd();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$malophoc = $this->input->post('malophoc');
			$mabomon = $this->input->post('mabomon');
			$matinhthanh = $this->input->post('matinhthanh');
			$maquanhuyen = $this->input->post('maquanhuyen');
			$diachi = $this->input->post('diachi');
			$ngaybatdau = $this->input->post('ngaybatdau');
			$mucluong = $this->input->post('mucluong');
			$yeucaugioitinh = $this->input->post('gioitinh');
			$mucphi = $this->input->post('mucphi');
			$sobuoi = $this->input->post('sobuoi');
			$thoigianday = $this->input->post('thoigianday');
			$hinhthuc = $this->input->post('hinhthuc');
			$sodienthoai = $this->input->post('sodienthoai');

			if(empty($diachi) || empty($ngaybatdau) || empty($mucluong) || empty($mucphi) || empty($sobuoi) || empty($sodienthoai)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemLopGiaSu', $data);
			}

			$this->Model_LopGiaSu->add($matinhthanh, $maquanhuyen, $malophoc, $mabomon, $diachi, $ngaybatdau, $mucluong, $mucphi, $yeucaugioitinh, $sobuoi, $thoigianday, $hinhthuc, $sodienthoai);

			$this->session->set_flashdata('success', 'Thêm lớp học gia sư thành công!');
			return redirect(base_url('admin/lop-gia-su/'));
		}
		return $this->load->view('Admin/View_ThemLopGiaSu', $data);
	}


	public function update($malopgiasu)
	{
		if(count($this->Model_LopGiaSu->getById($malopgiasu)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-gia-su/'));
		}

		$data['title'] = "Cập nhật lớp học gia sư";
		$data['detail'] = $this->Model_LopGiaSu->getById($malopgiasu);
		$data['lophoc'] = $this->Model_LopHoc->getAllAdd();
		$data['bomon'] = $this->Model_BoMon->getAllAdd();
		$data['quanhuyen'] = $this->Model_ViTri->getAllQuanHuyenAdd();
		$data['tinhthanh'] = $this->Model_ViTri->getAllTinhThanhAdd();

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$malophoc = $this->input->post('malophoc');
			$mabomon = $this->input->post('mabomon');
			$matinhthanh = $this->input->post('matinhthanh');
			$maquanhuyen = $this->input->post('maquanhuyen');
			$diachi = $this->input->post('diachi');
			$ngaybatdau = $this->input->post('ngaybatdau');
			$mucluong = $this->input->post('mucluong');
			$yeucaugioitinh = $this->input->post('gioitinh');
			$mucphi = $this->input->post('mucphi');
			$sobuoi = $this->input->post('sobuoi');
			$thoigianday = $this->input->post('thoigianday');
			$hinhthuc = $this->input->post('hinhthuc');
			$sodienthoai = $this->input->post('sodienthoai');

			if(empty($diachi) || empty($ngaybatdau) || empty($mucluong) || empty($mucphi) || empty($sobuoi) || empty($sodienthoai)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemLopGiaSu', $data);
			}

			$this->Model_LopGiaSu->update($matinhthanh, $maquanhuyen, $malophoc, $mabomon, $diachi, $ngaybatdau, $mucluong, $mucphi, $yeucaugioitinh, $sobuoi, $thoigianday, $hinhthuc, $sodienthoai, $malopgiasu);

			$data['success'] = "Cập nhật lớp học gia sư thành công!";
			$data['detail'] = $this->Model_LopGiaSu->getById($malophoc);
			return $this->load->view('Admin/View_SuaLopGiaSu', $data);
		}

		return $this->load->view('Admin/View_SuaLopGiaSu', $data);
	}


	public function delete($malopgiasu)
	{
		if(count($this->Model_LopGiaSu->getById($malopgiasu)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-gia-su/'));
		}
		$this->Model_LopGiaSu->delete($malopgiasu);

		$this->session->set_flashdata('success', 'Xóa lớp học gia sư thành công!');
		return redirect(base_url('admin/lop-gia-su/'));
	}

	public function addTutor($malopgiasu){
		if(count($this->Model_LopGiaSu->getById($malopgiasu)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-gia-su/'));
		}

		$data['detail'] = $this->Model_LopGiaSu->getById($malopgiasu);
		$data['lophoc'] = $this->Model_LopHoc->getAllAdd();
		$data['bomon'] = $this->Model_BoMon->getAllAdd();
		$data['quanhuyen'] = $this->Model_ViTri->getAllQuanHuyenAdd();
		$data['tinhthanh'] = $this->Model_ViTri->getAllTinhThanhAdd();
		$data['title'] = "Thêm gia sư cho lớp gia sư";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$magiasu = $this->input->post('magiasu');

			if(count($this->Model_GiaSu->getById($magiasu)) <= 0){
				$data['error'] = "Gia sư không tồn tại trong hệ thống!";
				return $this->load->view('Admin/View_LopGiaSuThemGiaSu', $data);
			}

			if(count($this->Model_LopGiaSu->getGiaSuLopHocGiaSu($magiasu,$this->Model_LopGiaSu->getById($malopgiasu)[0]['MaLopGiaSu'])) >= 1){
				$data['error'] = "Gia sư đã có trong danh sách giảng dạy lớp này!";
				return $this->load->view('Admin/View_LopGiaSuThemGiaSu', $data);
			}

			$this->Model_LopGiaSu->insertGiaSuLopHocGiaSu($magiasu, $malopgiasu);

			$this->session->set_flashdata('success', 'Thêm gia sư nhận lớp thành công!');
			return redirect(base_url('admin/lop-gia-su/'.$this->Model_LopGiaSu->getById($malopgiasu)[0]['MaLopGiaSu'].'/gia-su/'));
		}

		return $this->load->view('Admin/View_LopGiaSuThemGiaSu', $data);
	}

	public function tutor($malopgiasu){
		if(count($this->Model_LopGiaSu->getById($malopgiasu)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-gia-su/'));
		}

		$data['detail'] = $this->Model_LopGiaSu->getById($malopgiasu);
		$data['title'] = "Danh sách gia sư giảng dạy lớp";
		$data['list'] = $this->Model_LopGiaSu->getTutor($malopgiasu);
		return $this->load->view('Admin/View_LopGiaSuDanhSachGiaSu', $data);
	}

	public function deleteTutor($malopgiasu,$magiasu){
		$this->Model_LopGiaSu->deleteGiaSuLopHocGiaSu($magiasu, $malopgiasu);
		$this->session->set_flashdata('success', 'Xóa gia sư khỏi lớp này thành công!');
		return redirect(base_url('admin/lop-gia-su/'.$malopgiasu.'/gia-su/'));
	}
}

/* End of file LopHoc.php */
/* Location: ./application/controllers/LopHoc.php */