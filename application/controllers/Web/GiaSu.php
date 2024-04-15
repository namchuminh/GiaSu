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

}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */