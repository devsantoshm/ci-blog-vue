<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_m extends MY_Model {

	protected $_table_name = 'areas';

  public $rules = array(
    array(
      'field' => 'name',
      'label' => 'area',
      'rules' => 'trim|required'
    )
  );

	public function __construct()
	{
		parent::__construct();
	}

  public function get_new()
  {
    $area = new stdClass(); //declaro una nueva instancia de clase y relleno los valores en blanco;
    $area->name = '';
  
    return $area;
  }

}

/* End of file area_m.php */
/* Location: ./application/models/area_m.php */