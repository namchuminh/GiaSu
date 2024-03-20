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

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */