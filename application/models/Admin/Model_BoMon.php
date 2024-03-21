<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BoMon extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tenbomon,$duongdan,$malophoc){
		$data = array(
	        "TenBoMon" => $tenbomon,
	        "MaLopHoc" => $malophoc,
	        "DuongDan" => $duongdan,
	    );

	    $this->db->insert('bomon', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM bomon WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT bomon.*, lophoc.TenLopHoc, lophoc.MaLopHoc FROM bomon, lophoc WHERE bomon.MaLopHoc = lophoc.MaLopHoc AND bomon.TrangThai = 1 ORDER BY TenBoMon ASC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaBoMon){
		$sql = "SELECT * FROM bomon WHERE MaBoMon = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaBoMon));
		return $result->result_array();
	}

	public function update($tenbomon,$duongdan,$malophoc,$mabomon){
		$sql = "UPDATE bomon SET TenBoMon = ?, DuongDan = ?, MaLopHoc = ? WHERE MaBoMon = ?";
		$result = $this->db->query($sql, array($tenbomon,$duongdan,$malophoc,$mabomon));
		return $result;
	}

	public function delete($mabomon){
		$sql = "UPDATE bomon SET TrangThai = 0 WHERE MaBoMon = ?";
		$result = $this->db->query($sql, array($mabomon));
		return $result;
	}

	public function getGiaSuBoMon($magiasu, $mabomon){
		return $this->db->query('SELECT * FROM `giasu_bomon` WHERE MaGiaSu = ? AND MaBoMon = ?', array($magiasu, $mabomon))->result_array();
	}

	public function deleteGiaSuBoMon($magiasu){
		return $this->db->query('DELETE FROM `giasu_bomon` WHERE MaGiaSu = ?', array($magiasu));
	}

	public function insertGiaSuBoMon($mabomon, $magiasu){
		return $this->db->query('INSERT INTO `giasu_bomon` (MaBoMon,MaGiaSu) VALUES(?,?)', array($mabomon, $magiasu));
	}

	public function getCountGiaSuMonHoc($mabomon){
		return $this->db->query('SELECT * FROM `giasu_bomon` WHERE MaBoMon = ?', array($mabomon))->result_array();
	}

	public function getMonHocGiaSu($MaBoMon,$start = 0, $end = 10){
		$sql = "SELECT giasu.*, giasu_bomon.*, tinhthanh.TenTinhThanh FROM giasu_bomon, giasu, tinhthanh WHERE giasu_bomon.MaGiaSu = giasu.MaGiaSu AND giasu.TrangThai = 1 AND giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu_bomon.MaBoMon = ? ORDER BY giasu.HoTen ASC LIMIT ?, ?";
		$result = $this->db->query($sql, array($MaBoMon,$start, $end));
		return $result->result_array();
	}

	public function checkNumberTutor($MaBoMon)
	{
		$sql = "SELECT * FROM giasu_bomon WHERE MaBoMon = ?";
		$result = $this->db->query($sql, array($MaBoMon));
		return $result->num_rows();
	}
}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */