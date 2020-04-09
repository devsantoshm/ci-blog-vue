<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	public $_rules = array();

	public function __construct()
	{
		parent::__construct();
	}

  public function array_from_post($fields)
  {
    $data = array();
    foreach($fields as $value){
      $data[$value] = $this->input->post($value);
    }
    return $data;
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

	public function save($data, $id = NULL)
	{
		// Insert
		if ($id === NULL) {
			$this->db->insert($this->_table_name, $data);
			$id = $this->db->insert_id();
		} 
		// Update
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name, $data);			
		}

		return $id;
	}

	public function delete($id)
	{
		$filter = $this->_primary_filter;
		$id = $filter($id);

		if (!$id) {
			return FALSE;
		}

		$this->db->where($this->_primary_ley, $id);
		$this->db->delete($this->_table_name);

	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */