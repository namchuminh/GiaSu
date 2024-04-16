<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LopGiaSu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_KhuVuc');
		$this->load->model('Web/Model_LopHoc');
		$this->load->model('Web/Model_BoMon');
		$this->load->model('Web/Model_LopGiaSu');
		$this->load->model('Web/Model_CauHinh');
	}

	public function index()
	{
		$data['title'] = "Thuê gia sư";
		$data['province'] = $this->Model_KhuVuc->getAll();
		$data['class'] = $this->Model_LopHoc->getAll();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$matinhthanh = $this->input->post('matinhthanh');
			$maquanhuyen = $this->input->post('maquanhuyen');
			$diachi = $this->input->post('diachi');
			$malophoc = $this->input->post('malophoc');
			$mabomon = $this->input->post('mabomon');
			$sodienthoai = $this->input->post('sodienthoai');
			$mucluong = $this->input->post('mucluong');
			$yeucaugioitinh = $this->input->post('yeucaugioitinh');
			$thoigianday = $this->input->post('thoigianday');
			$hinhthuc = $this->input->post('hinhthuc');
			$ngaybatdau = $this->input->post('ngaybatdau');
			$sobuoi = $this->input->post('sobuoi');


			if(empty($maquanhuyen) || empty($diachi) || empty($mabomon) || empty($sodienthoai) || empty($mucluong) || empty($thoigianday) || empty($hinhthuc) || empty($ngaybatdau) || empty($sobuoi)){
				$data['error'] = "Vui lòng nhập đủ thông tin!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}


			if(($yeucaugioitinh != 1) && ($yeucaugioitinh != 0)){
				$data['error'] = "Giới tính không hợp lệ!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			if(!is_numeric($sobuoi) || ($sobuoi < 1) || ($sobuoi > 7)){
				$data['error'] = "Số buổi dạy không hợp lệ!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			if(!is_numeric($maquanhuyen)){
				$data['error'] = "Vui lòng chọn lại quận huyện!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			if(!is_numeric($mabomon)){
				$data['error'] = "Vui lòng chọn lại môn học!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			$mucluong = preg_replace('/[^0-9]/', '', $mucluong);

			if(!is_numeric($mucluong) || ($mucluong <= 0)){
				$data['error'] = "Mức lương không hợp lệ!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			if($ngaybatdau <= date("Y-m-d")){
				$data['error'] = "Ngày bắt đầu phải sau ngày hiện tại!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			if(!is_numeric($sodienthoai) || (strlen($sodienthoai)) > 10){
				$data['error'] = "Số điện thoại không hợp lệ!";
				return $this->load->view('Web/View_LopGiaSu', $data);
			}

			$mucphi = ($mucluong * $this->Model_CauHinh->getAll()[0]['MucPhi']) / 100;

			$this->Model_LopGiaSu->insert($matinhthanh,$maquanhuyen,$malophoc,$mabomon,$diachi,$ngaybatdau,$mucluong,$yeucaugioitinh,$sobuoi,$thoigianday,$hinhthuc,$sodienthoai,$mucphi);

			return $this->load->view('Web/View_ThueGiaSuThanhCong', $data);

		}

		return $this->load->view('Web/View_LopGiaSu', $data);
	}

	public function getDistrict(){
		$matinhthanh = $this->input->post('matinhthanh');
		$data = $this->Model_KhuVuc->getDistrict($matinhthanh);
		echo json_encode($data);
	}

	public function getSubject(){
		$malophoc = $this->input->post('malophoc');
		$data = $this->Model_BoMon->getSubject($malophoc);
		echo json_encode($data);
	}

}

/* End of file LopGiaSu.php */
/* Location: ./application/controllers/LopGiaSu.php */