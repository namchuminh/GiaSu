<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_KhuVuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll(){
		$sql = "SELECT * FROM tinhthanh WHERE TrangThai = 1 ORDER BY TenTinhThanh ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function checkNumber()
	{
		$sql = "SELECT giasu.* FROM giasu, tinhthanh WHERE giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu.TrangThai = 1 AND tinhthanh.TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getTutor($start = 0, $end = 12){
		$sql = "SELECT giasu.*, tinhthanh.TenTinhThanh FROM giasu, tinhthanh WHERE giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu.TrangThai = 1 AND tinhthanh.TrangThai = 1 ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function search($TenTinhThanh){
		$TenTinhThanh = '%'.$TenTinhThanh.'%';
		$sql = "SELECT giasu.*, tinhthanh.TenTinhThanh FROM giasu, tinhthanh WHERE giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu.TrangThai = 1 AND tinhthanh.TrangThai = 1 AND tinhthanh.TenTinhThanh LIKE ?";
		$result = $this->db->query($sql, array($TenTinhThanh));
		return $result->result_array();
	}

	public function getBySlug($duongdan, $start = 0, $end = 12){
		$sql = "SELECT giasu.*, tinhthanh.TenTinhThanh FROM giasu, tinhthanh WHERE giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu.TrangThai = 1 AND tinhthanh.TrangThai = 1 AND tinhthanh.DuongDan = ? ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($duongdan, $start, $end));
		return $result->result_array();
	}

	public function checkNumberDetail($duongdan){
		$sql = "SELECT giasu.*, tinhthanh.TenTinhThanh FROM giasu, tinhthanh WHERE giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu.TrangThai = 1 AND tinhthanh.TrangThai = 1 AND tinhthanh.DuongDan = ?";
		$result = $this->db->query($sql, array($duongdan));
		return $result->num_rows();
	}
}

/* End of file DangNhap.php */
/* Location: ./application/models/DangNhap.php */