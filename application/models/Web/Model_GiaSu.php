<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GiaSu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getById($MaGiaSu){
		$sql = "SELECT * FROM giasu WHERE MaGiaSu = ? AND TrangThai = 1";
		$result = $this->db->query($sql, array($MaGiaSu));
		return $result->result_array();
	}

	public function updateNumber($MaGiaSu,$SoLuong){
		$sql = "UPDATE giasu SET SoLuong = ? WHERE MaGiaSu = ?";
		$result = $this->db->query($sql, array($SoLuong,$MaGiaSu));
		return $result;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM giasu WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 12){
		$sql = "SELECT * FROM giasu WHERE TrangThai = 1 ORDER BY MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}


	public function getByType($Loaigiasu){

		if($Loaigiasu == 1){
			$sql = "SELECT * FROM giasu WHERE TrangThai = 1 ORDER BY MaGiaSu DESC LIMIT 9";
			$result = $this->db->query($sql);
			return $result->result_array();
		}else if($Loaigiasu == 2){
			$sql = "SELECT giasu.*, tinhthanh.TenTinhThanh FROM giasu, tinhthanh WHERE giasu.TrangThai = 1 AND giasu.MaTinhThanh = tinhthanh.MaTinhThanh ORDER BY RAND() LIMIT 9";
			$result = $this->db->query($sql);
			return $result->result_array();
		}else{
			$sql = "SELECT giasu.*, bomon.TenBoMon FROM giasu INNER JOIN giasu_bomon ON giasu.MaGiaSu = giasu_bomon.MaGiaSu INNER JOIN bomon ON giasu_bomon.MaBoMon = bomon.MaBoMon WHERE giasu.TrangThai = 1 ORDER BY RAND() LIMIT 10";
			$result = $this->db->query($sql);
			return $result->result_array();
		}
		
	}

	public function search($Tengiasu){
		$Tengiasu = '%'.$Tengiasu.'%';
		$sql = "SELECT * FROM giasu WHERE TrangThai = 1 AND HoTen LIKE ?";
		$result = $this->db->query($sql, array($Tengiasu));
		return $result->result_array();
	}
}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */