<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LienHe extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web/Model_LienHe');
		$array_items = array('lienhe');
        $this->session->unset_userdata($array_items);
	}

	public function index()
	{
		$data['title'] = "Liên hệ";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$tenkhachhang = $this->input->post('tenkhachhang');
			$email = $this->input->post('email');
			$sodienthoai = $this->input->post('sodienthoai');
			$tieude = $this->input->post('tieude');
			$noidung = $this->input->post('noidung');

			if($tieude == "" || $noidung == "" || $email == "" || $sodienthoai == ""){
				$data['error'] = "Vui lòng nhập đủ thông tin liên hệ!";
				return $this->load->view('Web/View_LienHe', $data);
			}

			$this->Model_LienHe->insert($tenkhachhang,$sodienthoai,$email,$tieude,$noidung);
			$data['success'] = "Cảm ơn bạn đã gửi liên hệ với chúng tôi!";
			return $this->load->view('Web/View_LienHe', $data);
		}
		return $this->load->view('Web/View_LienHe', $data);
	}

}

/* End of file LienHe.php */
/* Location: ./application/controllers/LienHe.php */