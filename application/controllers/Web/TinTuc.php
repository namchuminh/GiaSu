<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TinTuc extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_TinTuc');
		$this->load->model('Web/Model_GiaSu');
        $this->load->model('Web/Model_GiaoDien');
        $this->load->model('Web/Model_LopHoc');
        $this->load->model('Web/Model_BoMon');
        $this->load->model('Web/Model_KhuVuc');
	}

	public function index()
	{
		$data['title'] = "Danh sách tin tức";
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();

		if(isset($_GET['s']) && !empty($_GET['s'])){
			$data['totalPages'] = 0;
			$data['list'] = $this->Model_TinTuc->search($_GET['s']);
			return $this->load->view('Web/View_TinTuc', $data);
		}

		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 6;
		$totalPages = ceil($totalRecords / $recordsPerPage); 
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_TinTuc->getAll();

		return $this->load->view('Web/View_TinTuc', $data);
	}

	public function page($trang){
		$data['title'] = "Danh sách tin tức";
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
		
		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 6;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('tin-tuc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('tin-tuc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAll();
			return $this->load->view('Web/View_TinTuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAll($start);
			return $this->load->view('Web/View_TinTuc', $data);
		}
	}

	public function detail($duongdan){
		if(count($this->Model_TinTuc->getBySlug($duongdan)) <= 0){
			$data['title'] = "Không tìm thấy tin tức";
			return $this->load->view('Web/404', $data);
		}

		$data['title'] = $this->Model_TinTuc->getBySlug($duongdan)[0]['TieuDe'];
		$data['detail'] = $this->Model_TinTuc->getBySlug($duongdan);
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
		$data['tag'] = $this->Model_TinTuc->getTag();
		$data['related'] = $this->Model_TinTuc->getRelated($duongdan);
		$data['new'] = $this->Model_TinTuc->getNew();
		return $this->load->view('Web/View_ChiTietTinTuc', $data);
	}

}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */