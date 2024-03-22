<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ViTri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_ViTri');
	}

	public function index()
	{
		$totalRecords = $this->Model_ViTri->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ViTri->getAll();
		$data['title'] = "Quản lý vị trí gia sư";
		return $this->load->view('Admin/View_ViTri', $data);
	}

	public function page($trang){
		$data['title'] = "Quản lý vị trí gia sư";
		$totalRecords = $this->Model_ViTri->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/vi-tri/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/vi-tri/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ViTri->getAll();
			return $this->load->view('Admin/View_ViTri', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ViTri->getAll($start);
			return $this->load->view('Admin/View_ViTri', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm vị trí gia sư";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tentinh = $this->input->post('tentinh');
			$duongdan = $this->input->post('duongdan');

			if(empty($tentinh) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemViTri', $data);
			}

			$this->Model_ViTri->add($tentinh,$duongdan);

			$this->session->set_flashdata('success', 'Thêm Tỉnh / Thành Phố thành công!');
			return redirect(base_url('admin/vi-tri/'));
		}
		return $this->load->view('Admin/View_ThemViTri', $data);
	}


	public function update($mavitri)
	{
		if(count($this->Model_ViTri->getById($mavitri)) <= 0){
			$this->session->set_flashdata('error', 'Tỉnh / Thành Phố không tồn tại!');
			return redirect(base_url('admin/vi-tri/'));
		}

		$data['title'] = "Cập nhật vị trí gia sư";
		$data['detail'] = $this->Model_ViTri->getById($mavitri);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tentinh = $this->input->post('tentinh');
			$duongdan = $this->input->post('duongdan');

			if(empty($tentinh) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaViTri', $data);
			}

			$this->Model_ViTri->update($tentinh,$duongdan,$mavitri);
			$data['success'] = "Cập nhật Tỉnh / Thành Phố thành công!";
			$data['detail'] = $this->Model_ViTri->getById($mavitri);
			return $this->load->view('Admin/View_SuaViTri', $data);
		}

		return $this->load->view('Admin/View_SuaViTri', $data);
	}


	public function view($mavitri)
	{
		if(count($this->Model_ViTri->getQuanHuyen($mavitri)) <= 0){
			$this->session->set_flashdata('error', 'Tỉnh / Thành Phố chưa có Quận / Huyện!');
			return redirect(base_url('admin/vi-tri/'));
		}

		$data['title'] = "Danh sách quận huyện";
		$data['list'] = $this->Model_ViTri->getQuanHuyen($mavitri);
		$data['tinh'] = $this->Model_ViTri->getById($mavitri);
		return $this->load->view('Admin/View_XemQuanHuyen', $data);

	}

	public function addDistrict($matinhthanh){
		if(count($this->Model_ViTri->getById($matinhthanh)) <= 0){
			$this->session->set_flashdata('error', 'Tỉnh / Thành Phố không tồn tại!');
			return redirect(base_url('admin/vi-tri/'));
		}
		$data['title'] = "Thêm vị trí gia sư";
		$data['tinh'] = $this->Model_ViTri->getById($matinhthanh);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenquanhuyen = $this->input->post('tenquanhuyen');
			$duongdan = $this->input->post('duongdan');

			if(empty($tenquanhuyen) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_ThemQuanHuyen', $data);
			}

			$this->Model_ViTri->addDistrict($tenquanhuyen,$matinhthanh,$duongdan);

			$this->session->set_flashdata('success', 'Thêm Quận / Huyện thành công!');
			return redirect(base_url('admin/vi-tri/'.$matinhthanh.'/xem/'));
		}
		return $this->load->view('Admin/View_ThemQuanHuyen', $data);
	}


	public function updateDistrict($matinhthanh,$maquanhuyen){
		if(count($this->Model_ViTri->getById($matinhthanh)) <= 0){
			$this->session->set_flashdata('error', 'Tỉnh / Thành Phố không tồn tại!');
			return redirect(base_url('admin/vi-tri/'));
		}

		if(count($this->Model_ViTri->getQuanHuyenDetail($matinhthanh,$maquanhuyen)) <= 0){
			$this->session->set_flashdata('error', 'Quận / Huyện không tồn tại!');
			return redirect(base_url('admin/vi-tri/'.$matinhthanh.'/xem/'));
		}

		$data['title'] = "Cập nhật vị trí gia sư";
		$data['tinh'] = $this->Model_ViTri->getById($matinhthanh);
		$data['detail'] = $this->Model_ViTri->getQuanHuyenDetail($matinhthanh,$maquanhuyen);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenquanhuyen = $this->input->post('tenquanhuyen');
			$duongdan = $this->input->post('duongdan');

			if(empty($tenquanhuyen) || empty($duongdan)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Admin/View_SuaQuanHuyen', $data);
			}

			$this->Model_ViTri->updateDistrict($tenquanhuyen,$duongdan,$maquanhuyen);

			$data['detail'] = $this->Model_ViTri->getQuanHuyenDetail($matinhthanh,$maquanhuyen);
			$data['success'] = "Cập nhật Quận / Huyện thành công!";
			return $this->load->view('Admin/View_SuaQuanHuyen', $data);
		}
		return $this->load->view('Admin/View_SuaQuanHuyen', $data);
	}

	public function deleteDistrict($matinhthanh,$maquanhuyen){
		if(count($this->Model_ViTri->getById($matinhthanh)) <= 0){
			$this->session->set_flashdata('error', 'Tỉnh / Thành Phố không tồn tại!');
			return redirect(base_url('admin/vi-tri/'));
		}

		if(count($this->Model_ViTri->getQuanHuyenDetail($matinhthanh,$maquanhuyen)) <= 0){
			$this->session->set_flashdata('error', 'Quận / Huyện không tồn tại!');
			return redirect(base_url('admin/vi-tri/'.$matinhthanh.'/xem/'));
		}

		$this->Model_ViTri->deleteDistrict($matinhthanh,$maquanhuyen);

		$this->session->set_flashdata('success', 'Xóa Quận / Huyện thành công!');
		return redirect(base_url('admin/vi-tri/'.$matinhthanh.'/xem/'));
	}


	public function delete($mavitri)
	{
		if(count($this->Model_ViTri->getById($mavitri)) <= 0){
			$this->session->set_flashdata('error', 'Tỉnh / Thành Phố không tồn tại!');
			return redirect(base_url('admin/vi-tri/'));
		}
		$this->Model_ViTri->delete($mavitri);

		$this->session->set_flashdata('success', 'Xóa Tỉnh / Thành Phố thành công!');
		return redirect(base_url('admin/vi-tri/'));
	}

	public function tutor($maquanhuyen){
		if(count($this->Model_ViTri->getQuanHuyenById($maquanhuyen)) <= 0){
			$this->session->set_flashdata('error', 'Quận / huyện gia sư không tồn tại!');
			return redirect(base_url('admin/vi-tri/'));
		}

		$matinhthanh = $this->Model_ViTri->getQuanHuyenById($maquanhuyen)[0]['MaTinhThanh'];

		if($this->Model_ViTri->checkNumberTutor($maquanhuyen) <= 0){
			$this->session->set_flashdata('error', 'Không có gia sư thuộc khu vực này!');
			return redirect(base_url('admin/vi-tri/'.$matinhthanh.'/xem/'));
		}

		$totalRecords = $this->Model_ViTri->checkNumberTutor($maquanhuyen);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['detail'] = $this->Model_ViTri->getQuanHuyenById($maquanhuyen);
		$data['thanhpho'] = $this->Model_ViTri->getById($this->Model_ViTri->getQuanHuyenById($maquanhuyen)[0]['MaTinhThanh']);
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ViTri->getViTriGiaSu($maquanhuyen);
		$data['title'] = "Danh sách gia sư";
		return $this->load->view('Admin/View_ViTriGiaSu', $data);
	}

	public function pageTutor($maquanhuyen,$trang){
		if(count($this->Model_ViTri->getQuanHuyenById($maquanhuyen)) <= 0){
			$this->session->set_flashdata('error', 'Quận / huyện gia sư không tồn tại!');
			return redirect(base_url('admin/vi-tri/'));
		}

		$data['title'] = "Danh sách gia sư";
		$totalRecords = $this->Model_ViTri->checkNumberTutor($maquanhuyen);
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/vi-tri/'.$maquanhuyen.'/gia-su/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/vi-tri/'.$maquanhuyen.'/gia-su/'));
		}

		$data['detail'] = $this->Model_ViTri->getQuanHuyenById($maquanhuyen);
		$data['thanhpho'] = $this->Model_ViTri->getById($this->Model_ViTri->getQuanHuyenById($maquanhuyen)[0]['MaTinhThanh']);

		$start = ($trang - 1) * $recordsPerPage;
		
		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ViTri->getViTriGiaSu($maquanhuyen);
			return $this->load->view('Admin/View_ViTriGiaSu', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ViTri->getViTriGiaSu($maquanhuyen,$start);
			return $this->load->view('Admin/View_ViTriGiaSu', $data);
		}
	}
}

/* End of file ViTri.php */
/* Location: ./application/controllers/ViTri.php */