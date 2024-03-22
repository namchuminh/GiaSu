<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LopHoc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_LopHoc');
	}

	public function index()
	{
		$totalRecords = $this->Model_LopHoc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_LopHoc->getAll();
		$data['title'] = "Quản lý lớp học gia sư";
		return $this->load->view('Admin/View_LopHoc', $data);
	}

	public function page($trang){
		$data['title'] = "Quản lý lớp học gia sư";
		$totalRecords = $this->Model_LopHoc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/lop-hoc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/lop-hoc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LopHoc->getAll();
			return $this->load->view('Admin/View_LopHoc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LopHoc->getAll($start);
			return $this->load->view('Admin/View_LopHoc', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm lớp học gia sư";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenlophoc = $this->input->post('tenlophoc');
			$duongdan = $this->input->post('duongdan');

			if(empty($tenlophoc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemLopHoc', $data);
			}

			$this->Model_LopHoc->add($tenlophoc,$duongdan);

			$this->session->set_flashdata('success', 'Thêm lớp học gia sư thành công!');
			return redirect(base_url('admin/lop-hoc/'));
		}
		return $this->load->view('Admin/View_ThemLopHoc', $data);
	}


	public function update($malophoc)
	{
		if(count($this->Model_LopHoc->getById($malophoc)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-hoc/'));
		}

		$data['title'] = "Cập nhật lớp học gia sư";
		$data['detail'] = $this->Model_LopHoc->getById($malophoc);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenlophoc = $this->input->post('tenlophoc');
			$duongdan = $this->input->post('duongdan');

			if(empty($tenmonhoc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaLopHoc', $data);
			}

			$this->Model_LopHoc->update($tenlophoc,$duongdan,$malophoc);
			$data['success'] = "Cập nhật lớp học gia sư thành công!";
			$data['detail'] = $this->Model_LopHoc->getById($malophoc);
			return $this->load->view('Admin/View_SuaLopHoc', $data);
		}

		return $this->load->view('Admin/View_SuaLopHoc', $data);
	}


	public function delete($malophoc)
	{
		if(count($this->Model_LopHoc->getById($malophoc)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-hoc/'));
		}
		$this->Model_LopHoc->delete($malophoc);

		$this->session->set_flashdata('success', 'Xóa lớp học gia sư thành công!');
		return redirect(base_url('admin/lop-hoc/'));
	}

	public function tutor($malophoc){
		if(count($this->Model_LopHoc->getById($malophoc)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-hoc/'));
		}

		if($this->Model_LopHoc->checkNumberTutor($malophoc) <= 0){
			$this->session->set_flashdata('error', 'Không có gia sư giảng dạy lớp học này!');
			return redirect(base_url('admin/lop-hoc/'));
		}

		$totalRecords = $this->Model_LopHoc->checkNumberTutor($malophoc);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['detail'] = $this->Model_LopHoc->getById($malophoc);
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_LopHoc->getLopHocGiaSu($malophoc);
		$data['title'] = "Danh sách gia sư";
		return $this->load->view('Admin/View_LopHocGiaSu', $data);
	}

	public function pageTutor($malophoc,$trang){
		if(count($this->Model_LopHoc->getById($malophoc)) <= 0){
			$this->session->set_flashdata('error', 'Lớp học gia sư không tồn tại!');
			return redirect(base_url('admin/lop-hoc/'));
		}

		$data['title'] = "Danh sách gia sư";
		$totalRecords = $this->Model_LopHoc->checkNumberTutor($malophoc);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/lop-hoc/'.$malophoc.'/gia-su/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/lop-hoc/'.$malophoc.'/gia-su/'));
		}

		$start = ($trang - 1) * $recordsPerPage;
		$data['detail'] = $this->Model_LopHoc->getById($malophoc);

		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LopHoc->getLopHocGiaSu($malophoc);
			return $this->load->view('Admin/View_LopHocGiaSu', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LopHoc->getLopHocGiaSu($malophoc,$start);
			return $this->load->view('Admin/View_LopHocGiaSu', $data);
		}
	}
}

/* End of file LopHoc.php */
/* Location: ./application/controllers/LopHoc.php */