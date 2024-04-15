<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BoMon extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM bomon ORDER BY TenBoMon ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

}	

/* End of file Model_KhachHang.php */
/* Location: ./application/models/Model_KhachHang.php */