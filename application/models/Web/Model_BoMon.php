<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BoMon extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM bomon ORDER BY TenBoMon ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function checkNumber()
	{
		$sql = "SELECT giasu.*, bomon.TenBoMon FROM giasu, bomon, giasu_bomon WHERE giasu.MaGiaSu = giasu_bomon.MaGiaSu AND giasu.TrangThai = 1 AND giasu_bomon.MaBoMon = bomon.MaBoMon AND bomon.TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getTutor($start = 0, $end = 12){
		$sql = "SELECT giasu.*, bomon.TenBoMon FROM giasu, bomon, giasu_bomon WHERE giasu.MaGiaSu = giasu_bomon.MaGiaSu AND giasu.TrangThai = 1 AND giasu_bomon.MaBoMon = bomon.MaBoMon AND bomon.TrangThai = 1 ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function search($TenBoMon){
		$TenBoMon = '%'.$TenBoMon.'%';
		$sql = "SELECT giasu.*, bomon.TenBoMon FROM giasu, bomon, giasu_bomon WHERE giasu.MaGiaSu = giasu_bomon.MaGiaSu AND giasu.TrangThai = 1 AND giasu_bomon.MaBoMon = bomon.MaBoMon AND bomon.TrangThai = 1 AND bomon.TenBoMon LIKE ?";
		$result = $this->db->query($sql, array($TenBoMon));
		return $result->result_array();
	}

	public function getBySlug($duongdan, $start = 0, $end = 12){
		$sql = "SELECT giasu.*, bomon.TenBoMon FROM giasu, bomon, giasu_bomon WHERE giasu.MaGiaSu = giasu_bomon.MaGiaSu AND giasu.TrangThai = 1 AND giasu_bomon.MaBoMon = bomon.MaBoMon AND bomon.TrangThai = 1 AND bomon.DuongDan = ? ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($duongdan, $start, $end));
		return $result->result_array();
	}

	public function checkNumberDetail($duongdan){
		$sql = "SELECT giasu.*, bomon.TenBoMon FROM giasu, bomon, giasu_bomon WHERE giasu.MaGiaSu = giasu_bomon.MaGiaSu AND giasu.TrangThai = 1 AND giasu_bomon.MaBoMon = bomon.MaBoMon AND bomon.TrangThai = 1 AND bomon.DuongDan = ?";
		$result = $this->db->query($sql, array($duongdan));
		return $result->num_rows();
	}

	public function getSubject($MaLopHoc){
		$sql = "SELECT * FROM bomon WHERE MaLopHoc = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaLopHoc));
		return $result->result_array();
	}
}	

/* End of file Model_KhachHang.php */
/* Location: ./application/models/Model_KhachHang.php */