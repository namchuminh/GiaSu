<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LopHoc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM lophoc ORDER BY TenLopHoc ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file Model_LopGiaSu.php */
/* Location: ./application/models/Model_LopGiaSu.php */