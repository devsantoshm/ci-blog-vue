<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Controller {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_rules = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function get($id = NULL, $single=FALSE)
	{
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		} elseif($single == TRUE) {
			$method = 'row';
		} else{
			$method = 'result';
		}
		
		return $this->db->get($this->_table_name)->$method();
	}

	public function get_by($where, $single = FALSE)
	{
		$this->db->where($where);

		return $this->get(NULL, $single);
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */