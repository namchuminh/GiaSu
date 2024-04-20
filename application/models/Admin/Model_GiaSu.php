<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GiaSu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($HoTen,$DiaChi,$NgaySinh,$ChucVu,$ChuyenNganh,$NamTotNghiep,$SoDienThoai,$Email,$LuongToiThieu,$AnhCCCDMatTruoc,$AnhCCCDMatSau,$AnhThe,$AnhBangCapSinhVien,$SoBuoiDay,$TenTruong,$MaTinhThanh){
		$data = array(
	        "HoTen" => $HoTen,
	        "DiaChi" => $DiaChi,
	        "NgaySinh" => $NgaySinh,
	        "ChucVu" => $ChucVu,
	        "ChuyenNganh" => $ChuyenNganh,
	        "NamTotNghiep" => $NamTotNghiep,
	        "SoDienThoai" => $SoDienThoai,
	        "Email" => $Email,
	        "LuongToiThieu" => $LuongToiThieu,
	        "AnhCCCDMatTruoc" => $AnhCCCDMatTruoc,
	        "AnhCCCDMatSau" => $AnhCCCDMatSau,
	        "AnhThe" => $AnhThe,
	        "AnhBangCapSinhVien" => $AnhBangCapSinhVien,
	        "SoBuoiDay" => $SoBuoiDay,
	        "TenTruong" => $TenTruong,
	        "MaTinhThanh" => $MaTinhThanh,
	        "TrangThai" => 1
	    );

	    $this->db->insert('giasu', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function update($HoTen,$DiaChi,$NgaySinh,$ChucVu,$ChuyenNganh,$NamTotNghiep,$SoDienThoai,$Email,$LuongToiThieu,$AnhCCCDMatTruoc,$AnhCCCDMatSau,$AnhThe,$AnhBangCapSinhVien,$SoBuoiDay,$TenTruong,$MaTinhThanh){
		$data = array(
	        "HoTen" => $HoTen,
	        "DiaChi" => $DiaChi,
	        "NgaySinh" => $NgaySinh,
	        "ChucVu" => $ChucVu,
	        "ChuyenNganh" => $ChuyenNganh,
	        "NamTotNghiep" => $NamTotNghiep,
	        "SoDienThoai" => $SoDienThoai,
	        "Email" => $Email,
	        "LuongToiThieu" => $LuongToiThieu,
	        "AnhCCCDMatTruoc" => $AnhCCCDMatTruoc,
	        "AnhCCCDMatSau" => $AnhCCCDMatSau,
	        "AnhThe" => $AnhThe,
	        "AnhBangCapSinhVien" => $AnhBangCapSinhVien,
	        "SoBuoiDay" => $SoBuoiDay,
	        "TenTruong" => $TenTruong,
	        "MaTinhThanh" => $MaTinhThanh,
	        "TrangThai" => 1
	    );

	    $this->db->where('TaiKhoan', $TaiKhoan);
	    $this->db->update('giasu', $data);

	    return $this->db->affected_rows();
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM bomon WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT giasu.*, tinhthanh.TenTinhThanh, tinhthanh.MaTinhThanh FROM giasu, tinhthanh WHERE giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu.TrangThai = 1 ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($magiasu){
		$sql = "SELECT * FROM giasu WHERE MaGiaSu = ? AND TrangThai != -1";
		$result = $this->db->query($sql, array($magiasu));
		return $result->result_array();
	}


	public function delete($magiasu){
		$sql = "UPDATE giasu SET TrangThai = -1 WHERE MaGiaSu = ?";
		$result = $this->db->query($sql, array($magiasu));
		return $result;
	}

	public function getInfoByUsername($taikhoan){
		$sql = "SELECT * FROM giasu WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function getInfoByPhone($sodienthoai){
		$sql = "SELECT * FROM giasu WHERE SoDienThoai = ?";
		$result = $this->db->query($sql, array($sodienthoai));
		return $result->result_array();
	}

	public function getInfoByEmail($email){
		$sql = "SELECT * FROM giasu WHERE Email = ?";
		$result = $this->db->query($sql, array($email));
		return $result->result_array();
	}

	public function checkNumberAccept()
	{
		$sql = "SELECT * FROM giasu WHERE TrangThai = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAllAccept($start = 0, $end = 10){
		$sql = "SELECT giasu.*, tinhthanh.TenTinhThanh, tinhthanh.MaTinhThanh FROM giasu, tinhthanh WHERE giasu.MaTinhThanh = tinhthanh.MaTinhThanh AND giasu.TrangThai = 0 ORDER BY giasu.MaGiaSu DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}


	public function accept($magiasu){
		$sql = "UPDATE giasu SET TrangThai = 1 WHERE MaGiaSu = ?";
		$result = $this->db->query($sql, array($magiasu));
		return $result;
	}
}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */