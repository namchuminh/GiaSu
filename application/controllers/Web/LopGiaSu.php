<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LopGiaSu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_KhuVuc');
		$this->load->model('Web/Model_LopHoc');
		$this->load->model('Web/Model_BoMon');
	}

	public function index()
	{
		$data['title'] = "Thuê gia sư";
		$data['province'] = $this->Model_KhuVuc->getAll();
		$data['class'] = $this->Model_LopHoc->getAll();
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