<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LienHe extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM lienhe";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM lienhe ORDER BY MaLienHe DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaLienHe){
		$sql = "SELECT * FROM lienhe WHERE MaLienHe = ?";
		$result = $this->db->query($sql, array($MaLienHe));
		return $result->result_array();
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */