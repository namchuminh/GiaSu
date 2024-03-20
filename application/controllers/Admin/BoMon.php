<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BoMon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_BoMon');
		$this->load->model('Admin/Model_LopHoc');
	}

	public function index()
	{
		$totalRecords = $this->Model_BoMon->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_BoMon->getAll();
		$data['title'] = "Quản lý môn học gia sư";
		return $this->load->view('Admin/View_BoMon', $data);
	}

	public function page($trang){
		$data['title'] = "Quản lý môn học gia sư";
		$totalRecords = $this->Model_BoMon->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/mon-hoc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/mon-hoc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BoMon->getAll();
			return $this->load->view('Admin/View_BoMon', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_BoMon->getAll($start);
			return $this->load->view('Admin/View_BoMon', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm môn học gia sư";
		$data['class'] = $this->Model_LopHoc->getAll(0,1000);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenmonhoc = $this->input->post('tenmonhoc');
			$duongdan = $this->input->post('duongdan');
			$malophoc = $this->input->post('malophoc');

			if(empty($tenmonhoc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemBoMon', $data);
			}

			$this->Model_BoMon->add($tenmonhoc,$duongdan,$malophoc);

			$this->session->set_flashdata('success', 'Thêm môn học gia sư thành công!');
			return redirect(base_url('admin/mon-hoc/'));
		}
		return $this->load->view('Admin/View_ThemBoMon', $data);
	}


	public function update($mabomon)
	{
		if(count($this->Model_BoMon->getById($mabomon)) <= 0){
			$this->session->set_flashdata('error', 'Môn học gia sư không tồn tại!');
			return redirect(base_url('admin/mon-hoc/'));
		}

		$data['title'] = "Cập nhật môn học gia sư";
		$data['detail'] = $this->Model_BoMon->getById($mabomon);
		$data['class'] = $this->Model_LopHoc->getAll(0,1000);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenmonhoc = $this->input->post('tenmonhoc');
			$duongdan = $this->input->post('duongdan');
			$malophoc = $this->input->post('malophoc');

			if(empty($tenmonhoc) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaBoMon', $data);
			}

			$this->Model_BoMon->update($tenmonhoc,$duongdan,$malophoc,$mabomon);
			$data['success'] = "Cập nhật môn học gia sư thành công!";
			$data['detail'] = $this->Model_BoMon->getById($mabomon);
			return $this->load->view('Admin/View_SuaBoMon', $data);
		}

		return $this->load->view('Admin/View_SuaBoMon', $data);
	}


	public function delete($mabomon)
	{
		if(count($this->Model_BoMon->getById($mabomon)) <= 0){
			$this->session->set_flashdata('error', 'Môn học gia sư không tồn tại!');
			return redirect(base_url('admin/mon-hoc/'));
		}
		$this->Model_BoMon->delete($mabomon);

		$this->session->set_flashdata('success', 'Xóa môn học gia sư thành công!');
		return redirect(base_url('admin/mon-hoc/'));
	}
}

/* End of file BoMon.php */
/* Location: ./application/controllers/BoMon.php */