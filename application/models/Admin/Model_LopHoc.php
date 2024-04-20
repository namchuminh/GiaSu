<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LopHoc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tenlophoc,$duongdan){
		$data = array(
	        "TenLopHoc" => $tenlophoc,
	        "DuongDan" => $duongdan,
	    );

	    $this->db->insert('lophoc', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM lophoc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM lophoc WHERE TrangThai = 1 ORDER BY TenLopHoc ASC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getAllAdd(){
		$sql = "SELECT * FROM lophoc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	

	public function getById($MaLopHoc){
		$sql = "SELECT * FROM lophoc WHERE MaLopHoc = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaLopHoc));
		return $result->result_array();
	}

	public function update($tenlophoc,$duongdan,$MaLopHoc){
		$sql = "UPDATE lophoc SET TenBoMon = ?, DuongDan = ? WHERE MaLopHoc = ?";
		$result = $this->db->query($sql, array($tenlophoc,$duongdan,$MaLopHoc));
		return $result;
	}

	public function delete($MaLopHoc){
		$sql = "UPDATE lophoc SET TrangThai = 0 WHERE MaLopHoc = ?";
		$result = $this->db->query($sql, array($MaLopHoc));
		return $result;
	}

	public function getGiaSuLopHoc($magiasu, $malophoc){
		return $this->db->query('SELECT * FROM `giasu_lophoc` WHERE MaGiaSu = ? AND MaLopHoc = ?', array($magiasu, $malophoc))->result_array();
	}

	public function deleteGiaSuLopHoc($magiasu){
		return $this->db->query('DELETE FROM `giasu_lophoc` WHERE MaGiaSu = ?', array($magiasu));
	}

	public function insertGiaSuLopHoc($malophoc, $magiasu){
		return $this->db->query('INSERT INTO `giasu_lophoc` (MaLopHoc,MaGiaSu) VALUES(?,?)', array($malophoc, $magiasu));
	}

	public function getCountGiaSuLopHoc($malophoc){
		return $this->db->query('SELECT giasu.* FROM `giasu_lophoc`, giasu WHERE giasu_lophoc.MaGiaSu = giasu.MaGiaSu AND giasu_lophoc.MaLopHoc = ? AND giasu.TrangThai = 1', array($malophoc))->result_array();
	}

	public function getLopHocGiaSu($MaLopHoc,$start = 0, $end = 10){
		$sql = "SELECT giasu.*, giasu_lophoc.*, tinhthanh.TenTinhThanh FROM giasu_lophoc, giasu, tinhthanh WHERE giasu_lophoc.MaGiaSu = giasu.MaGiaSu AND giasu.TrangThai = 1 AND giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu_lophoc.MaLopHoc = ? ORDER BY giasu.HoTen ASC LIMIT ?, ?";
		$result = $this->db->query($sql, array($MaLopHoc,$start, $end));
		return $result->result_array();
	}

	public function checkNumberTutor($MaLopHoc)
	{
		$sql = "SELECT * FROM giasu_lophoc WHERE MaLopHoc = ?";
		$result = $this->db->query($sql, array($MaLopHoc));
		return $result->num_rows();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */