<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LopGiaSu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($matinhthanh,$maquanhuyen,$malophoc,$mabomon,$diachi,$ngaybatdau,$mucluong,$yeucaugioitinh,$sobuoi,$thoigianday,$hinhthuc,$sodienthoai,$mucphi){
		$data = array(
	        "MaTinhThanh" => $matinhthanh,
	        "MaQuanHuyen" => $maquanhuyen,
	        "MaLopHoc" => $malophoc,
	        "MaBoMon" => $mabomon,
	        "DiaChi" => $diachi,
	        "NgayBatDau" => $ngaybatdau,
	        "MucLuong" => $mucluong,
	        "YeuCauGioiTinh" => $yeucaugioitinh,
	        "SoBuoi" => $sobuoi,
	        "ThoiGianDay" => $thoigianday,
	        "HinhThuc" => $hinhthuc,
	        "SoDienThoai" => $sodienthoai,
	        "MucPhi" => $mucphi,
	        "TrangThai" => 1,
	    );

	    $this->db->insert('lopgiasu', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function getById($malopgiasu)
	{
	    $sql = "SELECT * FROM lopgiasu WHERE TrangThai = 1 AND MaLopGiaSu = ? ";
		$result = $this->db->query($sql, array($malopgiasu));
		return $result->result_array();
	}

	public function insertgiasu_lopgiasu($malopgiasu,$magiasu){
		$data = array(
	        "MaGiaSu" => $magiasu,
	        "MaLopGiaSu" => $malopgiasu,
	        "TrangThai" => 1,
	    );

	    $this->db->insert('giasu_lopgiasu', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}
}

/* End of file Model_HoaDon.php */
/* Location: ./application/models/Model_HoaDon.php */