<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GiaoDien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_GiaoDien');
	}

	public function index()
	{
		$totalRecords = $this->Model_GiaoDien->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_GiaoDien->getAll();
		$data['title'] = "Giao diện website";
		return $this->load->view('Admin/View_GiaoDien', $data);
	}

	public function page($trang){
		$data['title'] = "Giao diện website";
		$totalRecords = $this->Model_GiaoDien->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/giao-dien/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/giao-dien/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaoDien->getAll();
			return $this->load->view('Admin/View_GiaoDien', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_GiaoDien->getAll($start);
			return $this->load->view('Admin/View_GiaoDien', $data);
		}
	}


	public function add()
	{
		$data['title'] = "Thêm giao diện website";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$duongdan = base_url();

			if(!empty($_POST['duongdan']) && isset($_POST['duongdan'])){
				$duongdan = $_POST['duongdan'];
			}
			
			$loaigiaodien = $this->input->post('loaigiaodien');
			$hinhanh = "";

			if(empty($loaigiaodien)){
				$data['error'] = "Vui lòng chọn loại giao diện!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}

			if(($loaigiaodien != 1) && ($loaigiaodien != 2) && ($loaigiaodien != 3) && ($loaigiaodien != 4)){
				$data['error'] = "Loại giao diện không hợp lệ!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}

			$this->Model_GiaoDien->add($duongdan,$hinhanh,$loaigiaodien);

			$this->session->set_flashdata('success', 'Thêm giao diện thành công!');
			return redirect(base_url('admin/giao-dien/'));
		}
		return $this->load->view('Admin/View_ThemGiaoDien', $data);
	}

	public function update($magiaodien)
	{
		if(count($this->Model_GiaoDien->getById($magiaodien)) <= 0){
			$this->session->set_flashdata('error', 'Chuyên mục không tồn tại!');
			return redirect(base_url('admin/giao-dien/'));
		}

		$data['title'] = "Cập nhật giao diện website";
		$data['detail'] = $this->Model_GiaoDien->getById($magiaodien);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$duongdan = $this->input->post('duongdan');
			$loaigiaodien = $this->input->post('loaigiaodien');
			$hinhanh = $this->Model_GiaoDien->getById($magiaodien)[0]['HinhAnh'];

			if(empty($duongdan)){
				$data['error'] = "Vui lòng nhập đường dẫn truy cập khi giao diện được click!";
				return $this->load->view('Admin/View_SuaGiaoDien', $data);
			}

			if(empty($loaigiaodien)){
				$data['error'] = "Vui lòng chọn loại giao diện!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}

			if(($loaigiaodien != 1) && ($loaigiaodien != 2) && ($loaigiaodien != 3) && ($loaigiaodien != 4)){
				$data['error'] = "Loại giao diện không hợp lệ!";
				return $this->load->view('Admin/View_SuaGiaoDien', $data);
			}

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$img = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$img['file_name'];
			}

			$this->Model_GiaoDien->update($duongdan,$hinhanh,$loaigiaodien,$magiaodien);
			$data['success'] = "Cập nhật giao diện thành công!";
			$data['detail'] = $this->Model_GiaoDien->getById($magiaodien);
			return $this->load->view('Admin/View_SuaGiaoDien', $data);
		}

		return $this->load->view('Admin/View_SuaGiaoDien', $data);
	}



	public function delete($magiaodien)
	{
		if(count($this->Model_GiaoDien->getById($magiaodien)) <= 0){
			$this->session->set_flashdata('error', 'Giao diện không tồn tại!');
			return redirect(base_url('admin/giao-dien/'));
		}
		$this->Model_GiaoDien->delete($magiaodien);

		$this->session->set_flashdata('success', 'Xóa giao diện thành công!');
		return redirect(base_url('admin/giao-dien/'));
	}
}

/* End of file GiaoDien.php */
/* Location: ./application/controllers/GiaoDien.php */