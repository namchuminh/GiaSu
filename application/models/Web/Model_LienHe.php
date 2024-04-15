<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LienHe extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($tenkhachhang,$sodienthoai,$email,$tieude,$noidung){
		$sql = "INSERT INTO `lienhe`(`TenKhachHang`,`SoDienThoai`,`Email`,`TieuDe`, `NoiDung`) VALUES (?, ?, ?, ?, ?)";
		$result = $this->db->query($sql, array($tenkhachhang,$sodienthoai,$email,$tieude,$noidung));
		return $result;
	}
}

/* End of file Model_LienHe.php */
/* Location: ./application/models/Model_LienHe.php */