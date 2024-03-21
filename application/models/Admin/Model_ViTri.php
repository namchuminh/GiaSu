<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ViTri extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tentinhthanh,$duongdan){
		$data = array(
	        "TenTinhThanh" => $tentinhthanh,
	        "DuongDan" => $duongdan,
	    );

	    $this->db->insert('tinhthanh', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM tinhthanh WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM tinhthanh WHERE TrangThai = 1 ORDER BY TenTinhThanh ASC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaTinhThanh){
		$sql = "SELECT * FROM tinhthanh WHERE MaTinhThanh = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaTinhThanh));
		return $result->result_array();
	}

	public function update($tentinhthanh,$duongdan,$MaTinhThanh){
		$sql = "UPDATE tinhthanh SET TenTinhThanh = ?, DuongDan = ? WHERE MaTinhThanh = ?";
		$result = $this->db->query($sql, array($tentinhthanh,$duongdan,$MaTinhThanh));
		return $result;
	}

	public function delete($MaTinhThanh){
		$sql = "UPDATE tinhthanh SET TrangThai = 0 WHERE MaTinhThanh = ?";
		$result = $this->db->query($sql, array($MaTinhThanh));
		return $result;
	}

	public function addDistrict($tenquanhuyen,$matinhthanh,$duongdan){
		$data = array(
	        "TenQuanHuyen" => $tenquanhuyen,
	        "MaTinhThanh" => $matinhthanh,
	        "DuongDan" => $duongdan,
	    );

	    $this->db->insert('quanhuyen', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function updateDistrict($tenquanhuyen,$duongdan,$MaQuanHuyen){
		$sql = "UPDATE quanhuyen SET TenQuanHuyen = ?, DuongDan = ? WHERE MaQuanHuyen = ?";
		$result = $this->db->query($sql, array($tenquanhuyen,$duongdan,$MaQuanHuyen));
		return $result;
	}

	public function getQuanHuyenDetail($matinhthanh,$maquanhuyen){
		$sql = "SELECT * FROM quanhuyen WHERE MaTinhThanh = ? AND MaQuanHuyen = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($matinhthanh,$maquanhuyen));
		return $result->result_array();
	}

	public function deleteDistrict($matinhthanh,$maquanhuyen){
		$sql = "UPDATE quanhuyen SET TrangThai = 0 WHERE MaTinhThanh = ? AND MaQuanHuyen = ?";
		$result = $this->db->query($sql, array($matinhthanh,$maquanhuyen));
		return $result;
	}

	public function getQuanHuyen($MaTinhThanh){
		$sql = "SELECT * FROM quanhuyen WHERE TrangThai = 1 AND MaTinhThanh = ? ORDER BY TenQuanHuyen ASC";
		$result = $this->db->query($sql, array($MaTinhThanh));
		return $result->result_array();
	}

	public function getGiaSuViTri($magiasu, $maquanhuyen){
		return $this->db->query('SELECT * FROM `giasu_quanhuyen` WHERE MaGiaSu = ? AND MaQuanHuyen = ?', array($magiasu, $maquanhuyen))->result_array();
	}

	public function deleteGiaSuViTri($magiasu){
		return $this->db->query('DELETE FROM `giasu_quanhuyen` WHERE MaGiaSu = ?', array($magiasu));
	}

	public function insertGiaSuViTri($maquanhuyen, $magiasu){
		return $this->db->query('INSERT INTO `giasu_quanhuyen` (MaQuanHuyen,MaGiaSu) VALUES(?,?)', array($maquanhuyen, $magiasu));
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */