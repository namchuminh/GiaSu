<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$data = array();
		$this->load->model('Web/Model_GiaoDien');
		$this->load->model('Web/Model_GiaSu');
		$this->load->model('Web/Model_ChuyenMuc');
		$this->load->model('Web/Model_LopHoc');
	}

	public function index()
	{
		$data['title'] = $this->data['config'][0]['TenWebsite'];
		$data['slide'] = $this->Model_GiaoDien->getByType(1);
		$data['banner1'] = $this->Model_GiaoDien->getByType(2);
		$data['banner2'] = $this->Model_GiaoDien->getByType(3);
		$data['banner3'] = $this->Model_GiaoDien->getByType(4);
		$data['new'] = $this->Model_GiaSu->getByType(1);
		$data['province'] = $this->Model_GiaSu->getByType(2);
		$data['subject'] = $this->Model_GiaSu->getByType(3);
		$data['class'] = $this->Model_LopHoc->getAll();
		return $this->load->view('Web/View_TrangChu', $data);
	}

}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */