<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LopGiaSu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($matinhthanh, $maquanhuyen, $malophoc, $mabomon, $diachi, $ngaybatdau, $mucluong, $mucphi, $yeucaugioitinh, $sobuoi, $thoigianday, $hinhthuc, $sodienthoai){
		$data = array(
	        "MaLopHoc" => $malophoc,
	        "MaBoMon" => $mabomon,
	        "MaTinhThanh" => $matinhthanh,
	        "MaQuanHuyen" => $maquanhuyen,
	        "DiaChi" => $diachi,
	        "NgayBatDau" => $ngaybatdau,
	        "MucLuong" => $mucluong,
	        "YeuCauGioiTinh" => $yeucaugioitinh,
	        "MucPhi" => $mucphi,
	        "SoBuoi" => $sobuoi,
	        "ThoiGianDay" => $thoigianday,
	        "HinhThuc" => $hinhthuc,
	        "SoDienThoai" => $sodienthoai,
	    );

		$this->db->insert('lopgiasu', $data);
		$lastInsertedId = $this->db->insert_id();

		return $lastInsertedId;
	}


	public function checkNumber()
	{
		$sql = "SELECT lopgiasu.*, tinhthanh.TenTinhThanh, quanhuyen.TenQuanHuyen, lophoc.TenLopHoc, bomon.TenBoMon FROM lopgiasu, tinhthanh, quanhuyen, lophoc, bomon WHERE lopgiasu.MaTinhThanh = tinhthanh.MaTinhThanh AND lopgiasu.MaQuanHuyen = quanhuyen.MaQuanHuyen AND lopgiasu.MaLopHoc = lophoc.MaLopHoc AND lopgiasu.MaBoMon = bomon.MaBoMon AND lopgiasu.TrangThai != 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT lopgiasu.*, tinhthanh.TenTinhThanh, quanhuyen.TenQuanHuyen, lophoc.TenLopHoc, bomon.TenBoMon FROM lopgiasu, tinhthanh, quanhuyen, lophoc, bomon WHERE lopgiasu.MaTinhThanh = tinhthanh.MaTinhThanh AND lopgiasu.MaQuanHuyen = quanhuyen.MaQuanHuyen AND lopgiasu.MaLopHoc = lophoc.MaLopHoc AND lopgiasu.MaBoMon = bomon.MaBoMon AND lopgiasu.TrangThai != 0 ORDER BY lopgiasu.MaLopGiaSu ASC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaLopGiaSu){
		$sql = "SELECT lopgiasu.*, tinhthanh.TenTinhThanh, quanhuyen.TenQuanHuyen, lophoc.TenLopHoc, bomon.TenBoMon FROM lopgiasu, tinhthanh, quanhuyen, lophoc, bomon WHERE lopgiasu.MaTinhThanh = tinhthanh.MaTinhThanh AND lopgiasu.MaQuanHuyen = quanhuyen.MaQuanHuyen AND lopgiasu.MaLopHoc = lophoc.MaLopHoc AND lopgiasu.MaBoMon = bomon.MaBoMon AND lopgiasu.TrangThai != 0 AND lopgiasu.MaLopGiaSu = ?";
		$result = $this->db->query($sql, array($MaLopGiaSu));
		return $result->result_array();
	}

	public function update($matinhthanh, $maquanhuyen, $malophoc, $mabomon, $diachi, $ngaybatdau, $mucluong, $mucphi, $yeucaugioitinh, $sobuoi, $thoigianday, $hinhthuc, $sodienthoai, $malopgiasu){
		$sql = "UPDATE lopgiasu SET matinhthanh = ?, maquanhuyen = ?, malophoc = ?, mabomon = ?, diachi = ?, ngaybatdau = ?, mucluong = ?, mucphi = ?, yeucaugioitinh = ?, sobuoi = ?, thoigianday = ?, hinhthuc = ?, sodienthoai = ? WHERE malopgiasu = ?";
		$result = $this->db->query($sql, array($matinhthanh, $maquanhuyen, $malophoc, $mabomon, $diachi, $ngaybatdau, $mucluong, $mucphi, $yeucaugioitinh, $sobuoi, $thoigianday, $hinhthuc, $sodienthoai, $malopgiasu));
		return $result;
	}

	public function delete($MaLopGiaSu){
		$sql = "UPDATE lopgiasu SET TrangThai = 0 WHERE MaLopGiaSu = ?";
		$result = $this->db->query($sql, array($MaLopGiaSu));
		return $result;
	}

	public function getGiaSuLopHocGiaSu($magiasu, $malopgiasu){
		return $this->db->query('SELECT * FROM `giasu_lopgiasu` WHERE MaGiaSu = ? AND MaLopGiaSu = ? AND TrangThai = 1', array($magiasu, $malopgiasu))->result_array();
	}

	public function getTutor($malopgiasu){
		return $this->db->query('SELECT giasu.*, tinhthanh.TenTinhThanh FROM giasu_lopgiasu, giasu, tinhthanh WHERE giasu_lopgiasu.MaGiaSu = giasu.MaGiaSu AND giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu_lopgiasu.MaLopGiaSu = ? AND giasu_lopgiasu.TrangThai = 1', array($malopgiasu))->result_array();
	}

	public function deleteGiaSuLopHocGiaSu($magiasu, $malopgiasu){
		return $this->db->query('UPDATE `giasu_lopgiasu` SET TrangThai = 0 WHERE MaGiaSu = ? AND MaLopGiaSu = ?', array($magiasu, $malopgiasu));
	}

	public function insertGiaSuLopHocGiaSu($magiasu, $malopgiasu){
		return $this->db->query('INSERT INTO `giasu_lopgiasu` (MaGiaSu,MaLopGiaSu) VALUES(?,?)', array($magiasu, $malopgiasu));
	}
}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */