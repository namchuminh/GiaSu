<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GiaoDien extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getByType($LoaiGiaoDien){
		$sql = "SELECT * FROM giaodien WHERE TrangThai = 1 ORDER BY MaGiaoDien DESC";
		$result = $this->db->query($sql, array($LoaiGiaoDien));
		return $result->result_array();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */