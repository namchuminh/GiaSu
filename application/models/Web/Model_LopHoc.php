<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LopHoc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM lophoc ORDER BY TenLopHoc ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


	public function checkNumber()
	{
		$sql = "SELECT giasu.*, lophoc.TenLopHoc FROM giasu, lophoc, giasu_lophoc WHERE giasu.MaGiaSu = giasu_lophoc.MaGiaSu AND giasu.TrangThai = 1 AND giasu_lophoc.Malophoc = lophoc.Malophoc AND lophoc.TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getTutor($start = 0, $end = 12){
		$sql = "SELECT giasu.*, lophoc.TenLopHoc FROM giasu, lophoc, giasu_lophoc WHERE giasu.MaGiaSu = giasu_lophoc.MaGiaSu AND giasu.TrangThai = 1 AND giasu_lophoc.Malophoc = lophoc.Malophoc AND lophoc.TrangThai = 1 ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function search($TenLopHoc){
		$TenLopHoc = '%'.$TenLopHoc.'%';
		$sql = "SELECT giasu.*, lophoc.TenLopHoc FROM giasu, lophoc, giasu_lophoc WHERE giasu.MaGiaSu = giasu_lophoc.MaGiaSu AND giasu.TrangThai = 1 AND giasu_lophoc.Malophoc = lophoc.Malophoc AND lophoc.TrangThai = 1 AND lophoc.TenLopHoc LIKE ?";
		$result = $this->db->query($sql, array($TenLopHoc));
		return $result->result_array();
	}

	public function getBySlug($duongdan, $start = 0, $end = 12){
		$sql = "SELECT giasu.*, lophoc.TenLopHoc FROM giasu, lophoc, giasu_lophoc WHERE giasu.MaGiaSu = giasu_lophoc.MaGiaSu AND giasu.TrangThai = 1 AND giasu_lophoc.Malophoc = lophoc.Malophoc AND lophoc.TrangThai = 1 AND lophoc.DuongDan = ? ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($duongdan, $start, $end));
		return $result->result_array();
	}

	public function checkNumberDetail($duongdan){
		$sql = "SELECT giasu.*, lophoc.TenLopHoc FROM giasu, lophoc, giasu_lophoc WHERE giasu.MaGiaSu = giasu_lophoc.MaGiaSu AND giasu.TrangThai = 1 AND giasu_lophoc.Malophoc = lophoc.Malophoc AND lophoc.TrangThai = 1 AND lophoc.DuongDan = ?";
		$result = $this->db->query($sql, array($duongdan));
		return $result->num_rows();
	}
}

/* End of file Model_LopGiaSu.php */
/* Location: ./application/models/Model_LopGiaSu.php */